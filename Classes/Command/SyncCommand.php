<?php
namespace FKU\FkuPeople\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use FKU\FkuPeople\Domain\Repository\PersonRepository;
use FKU\FkuPeople\Domain\Repository\UserRepository;

class SyncCommand extends Command {
	
    /**
     * Configure the command
     */
    protected function configure() {
        $this->setDescription('Synchronizing data from FKU database with fe_users');
        $this->setHelp('Takes information from FKU address database person table(s) and feeds it into TYPO3\'s fe_users table.');
		$this->addArgument('feuser_ids',InputArgument::OPTIONAL,'Optional. Comma-separated list of Typo3 FE user IDs to be synchronized; empty = all');
		$this->addArgument('log_email',InputArgument::OPTIONAL,'Optional. E-mail address to send log file');
    }

    /**
     * Executes the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

		$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$this->personRepository = $objectManager->get(PersonRepository::class);
		$this->userRepository = $objectManager->get(UserRepository::class);

        $io = new SymfonyStyle($input, $output);
		
		$feuser_ids = trim($input->getArgument('feuser_ids'));

		$UTC = new \DateTimeZone('UTC');
		$now = new \DateTime('now',$UTC);

		$log = '';
		$log .= 'Start '.chr(13);
		if ($feuser_ids) {
			$users = explode (',', $feuser_ids);
			$log .= count($users).' User(s)'.chr(13);
			foreach ($users as $userId) {
				$log .= 'User ID '.$userId.chr(13);
				if ($FEuser = $this->userRepository->findByUid($userId)) {
					$log .= 'Found user ID '.$FEuser->getUid().chr(13);
					$this->synchingFKUtoFE($FEuser);
				} else {
					$log .= 'User not found'.chr(13);
				}
			}
		} else {
			$users = $this->userRepository->findSyncable();
			$log .= count($users).' User(s)'.chr(13);
			foreach ($users as $user) {
				$userId = $user->getUid();
				$log .= 'User ID '.$userId.chr(13);
				if ($FEuser = $this->userRepository->findByUid($userId)) {
					$log .= 'Found user ID '.$FEuser->getUid().chr(13);
					if ($this->synchingFKUtoFE($FEuser)) {
						$log .= 'Synchronized user ID '.$userId.chr(13);
					}
				} else {
					$log .= 'User not found'.chr(13);
				}
			}
		}

		$persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);
		$persistenceManager->persistAll();

		$address = trim($input->getArgument('log_email'));
		if (GeneralUtility::validEmail($address)) {
			mail($address,'Log User Sync',$log);
		}
		return Command::SUCCESS;
	}
	
	
	/**
	 *
	 * @param \FKU\FkuPeople\Domain\Model\User $FEuser Frontend user object
	 * @return \bool
	 */
	private function synchingFKUtoFE (\FKU\FkuPeople\Domain\Model\User $FEuser) {
		if ($fkuId = $FEuser->getTxFkupeopleFkudbid()) {
			if ($FKUuser = $this->personRepository->findByUid($fkuId)) {
				$FEuser->setFirstName($FKUuser->getFirstname());
				$FEuser->setLastName($FKUuser->getLastname());
				$FEuser->setName($FKUuser->getFirstname().' '.$FKUuser->getLastname());
				$FEuser->setAddress($FKUuser->getAddress().' '.$FKUuser->getHousenumber());
				$FEuser->setTelephone($FKUuser->getPhone());
				$FEuser->setFax($FKUuser->getMobile());
				$FEuser->setEmail($FKUuser->getEmail());
				$FEuser->setCity($FKUuser->getZipcode().' '.$FKUuser->getCity());
				$FEuser->setTxFkupeopleFkudbsync(date('Y-m-d H:i:s'));
				$this->userRepository->update($FEuser);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
?>