<?php
namespace FKU\FkuPeople\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use FKU\FkuPeople\Domain\Repository\PersonRepository;

class BirthdayCommand extends Command {
	
    /**
     * Configure the command
     */
    protected function configure() {
        $this->setDescription('Sends an e-mail with upcoming birthdays of people');
        $this->setHelp('Sends an e-mail to all given addresses with a list of people that celebrate their birthday in the given number of days.');
		$this->addArgument('addresses',InputArgument::REQUIRED,'Comma-separated list of e-mail addresses');
		$this->addArgument('dateOffset', InputArgument::REQUIRED, 'Number of days difference between recent date and first day in mailing');
		$this->addArgument('numberOfDays', InputArgument::REQUIRED, 'Number of days counting from first day in mailing');
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

        $io = new SymfonyStyle($input, $output);

		$dateOffset = $input->getArgument('dateOffset');
		$numberOfDays = $input->getArgument('numberOfDays');
		
		$timestamp = strtotime('Today');
		if ($dateOffset > 0) {
			$timestamp = strtotime('+'.$dateOffset.' days', $timestamp);
		}

		$recipients = explode (',',$input->getArgument('addresses'));
		$today = strtotime('Today');
		$tomorrow = strtotime('Tomorrow');
		
		setlocale(LC_TIME, 'de_CH');
		$dates = [];
		$sum = 0;
		
		for ($i=0;$i<$numberOfDays;$i++) {
			$actualDay = strtotime('+'.$i.' days',$timestamp);
			$dates[$i] = array ('timestamp' => $actualDay, 'text' => strftime('%A',$actualDay).', '.date('d.m.Y',$actualDay));
			$dates[$i]['birthdays'] = $this->personRepository->findBirthday($actualDay, array(0,1), array(1,2));
			$sum += sizeof($dates[$i]['birthdays']);
		}
		
		// send message
		if (sizeof($recipients) > 0 and $sum > 0) {
			$textPlain = 'Geburtstagserinnerung'.chr(13).chr(13);
			$textHtml = '<html>'.chr(13).'<head>'.chr(13).'<style>'.chr(13).'body {font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 14px;}'.chr(13).'table {border-collapse: collapse; border: 1px solid;}'.chr(13).'th, td {border: 1px solid; font-size: 90%;text-align: left; padding: 0.3em;}'.chr(13).'</style>'.chr(13).'</head>'.chr(13).'<body><b>Geburtstagserinnerung</b><br /><br />';
			foreach ($dates as $day) {
				if (count($day['birthdays']) > 0) {
					$textPlain .= $day['text'].':'.chr(13);
					$textHtml .= '<b>'.$day['text'].':</b><br />';
					$textHtml .= '<table><tr><th>Name</th><th>Geburtstag</th><th>Kontakt</th><th>Status</th></tr>';
					foreach ($day['birthdays'] as $person) {
						$age = $this->calculateAge($person->getDateofbirth(), $day['timestamp']);
						$textPlain .= $person->getFirstname().' '.$person->getLastname().chr(13);
						$textPlain .= $age.' (Jahrgang: '.$person->getGeburtstag()->format('Y').')'.chr(13);
						$textPlain .= chr(13);
						$textHtml .= '<tr><td>'.$person->getFirstname().' '.$person->getLastname().'<br />'.$person->getAddress().' '.$person->getHousenumber().'<br />';
						if ($person->getAddressadd()) { $textHtml .= $person->getAddressadd().'<br />'; }
						$textHtml .= $person->getZipcode().' '.$person->getCity().'</td>';
						$textHtml .= '<td>'.$age.'<br />Jahrgang: '.$person->getGeburtstag()->format('Y').'</td>';
						$textHtml .= '<td>';
						if ($person->getPhone()) {$textHtml .= $person->getPhone().'<br />'; }
						if ($person->getMobile()) {$textHtml .= $person->getMobile().'<br />'; }
						if ($person->getEmail()) {$textHtml .= '<a href="mailto:'.$person->getEmail().'">'.$person->getEmail().'</a><br />'; }
						$textHtml .= '</td>';
						if ($person->getMemberstatus()==2) {
							$textHtml .= '<td>Mitglied</td>';
						} elseif ($person->getMemberstatus()==1) {
							$textHtml .= '<td>Freundeskreis</td>';
						} elseif ($person->getChild()==1) {
							$textHtml .= '<td>Kind</td>';
						} else {
							$textHtml .= '<td>--</td>';
						}
						$textHtml .= '</tr>';
					}
					$textHtml .= '</table><br />';
				}
			}
			$textPlain .= chr(13).'----------'.chr(13).'Sollten Angaben falsch sein, so teile die Korrektur bitte Merita Göldi (merita.goeldi@fku.ch) mit. Bei Fragen zu diesem Mailversand, wende dich bitte an Daniel Widmer (daniel.widmer@fku.ch).';
			$textHtml .= '<br /><hr><br />Sollten Angaben falsch sein, so teile die Korrektur bitte Merita Göldi (merita.goeldi@fku.ch) mit. Bei Fragen zu diesem Mailversand wende dich bitte an Daniel Widmer (daniel.widmer@fku.ch).
</body></html>';

			$message = GeneralUtility::makeInstance(MailMessage::class);

			$message
				->from(new Address('notification@fku.ch', 'FKU-Adressverwaltung'))
				->subject('Geburtstagserinnerung für '.$dates[0]['text'])
				->text($textPlain)
				->html($textHtml);

			if ($this->settings['notificationBlocker']) {
				// Avoid sending any notifications
				$io->writeln('Sending of e-mails blocked by exttension settings.');
				return 0;
			} else {
				foreach ($recipients as $address) {
					$message->to(new Address(trim($address)));
					$message->send();
				}
				$io->writeln('E-mail sent.');
				return Command::SUCCESS;
			}
		} else {
			$io->writeln('No recipients or no birthdays; no e-mail sent.');
			return Command::SUCCESS;
		}
	}

    /**
     * Calculates the age at a given date
     *
     * @param string $birthdate Birthdate
     * @param string $date Given Date
     * @return string Age of person
     */
    protected function calculateAge ($birthdate, $date = NULL) {
		if ($date === NULL) {
			$now = date_create('today');
		} elseif (is_string($date)) {
			$now = date_create($date);
		} else {
			$now = date_create(date('Y-m-d',$date));
		}
		
		if (is_string($birthdate)) {
			$birthday = date_create($birthdate);
		} else {
			$birthday = date_create(date('Y-m-d',$birthdate));
		}
		
		$age = intval(date_diff($birthday,$now)->y);
		if ($age == 1) {
			return '1 Jahr';
		} else {
			return $age.' Jahre';
		}
    }

}