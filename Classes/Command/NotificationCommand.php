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
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use FKU\FkuPeople\Domain\Repository\PersonRepository;
use FKU\FkuPeople\Domain\Repository\UserRepository;

class NotificationCommand extends Command {
	
    /**
     * separation
     */
	protected $separation = "\r-----\r";

    /**
     * Configure the command
     */
    protected function configure() {
        $this->setDescription('Sends notifications via e-mail to users');
        $this->setHelp('Sends an e-mail with set notifications to respective frontend users.');
    }

    /**
     * Executes the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

		if ($this->settings['notificationBlocker']) {
			// Avoid sending any notifications
			return Command::SUCCESS;
		}

		$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$this->personRepository = $objectManager->get(PersonRepository::class);
		$this->userRepository = $objectManager->get(UserRepository::class);

        $io = new SymfonyStyle($input, $output);

		$hour = date('G');
		$weekday = date('w');
		
		// Daily notifications
		$users = $this->userRepository->findDailyNotification($hour);
		foreach ($users as $user) {
			if ($DBID = $user->getTxFkupeopleFkudbid()) {
				$person = $this->personRepository->findByUid($DBID);
				if ($mail = $person->getEmail()) {
					$footer .= 'Dies ist eine automatische Nachricht, basierend auf Ihren persönlichen Einstellungen für tägliche Benachrichtigungen auf www.fku.ch. Bitte nicht darauf antworten.';
					$message = $this->prepareMail($user->getTxFkupeopleNotificationCacheday(), $footer);
					$message->to(new Address($mail, $person->getFirstname().' '.$person->getLastname()));
					$message->send();

					$user->setTxFkupeopleNotificationCacheday('');
					$this->userRepository->update($user);
				}
			}
		}

		// Weekly notification
		$users = $this->userRepository->findWeeklyNotification($weekday,$hour);
		foreach ($users as $user) {
			if ($DBID = $user->getTxFkupeopleFkudbid()) {
				$person = $this->personRepository->findByUid($DBID);
				if ($mail = $person->getEmail()) {
					$footer .= 'Dies ist eine automatische Nachricht, basierend auf Ihren persönlichen Einstellungen für wöchentliche Benachrichtigungen auf www.fku.ch. Bitte nicht darauf antworten.';
					$message = $this->prepareMail($user->getTxFkupeopleNotificationCacheweek(), $footer);
					$message->to(new Address($mail, $person->getFirstname().' '.$person->getLastname()));
					$message->send();

					$user->setTxFkupeopleNotificationCacheweek('');
					$this->userRepository->update($user);
				}
			}
		}

		$persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);
		$persistenceManager->persistAll();
		 
		return Command::SUCCESS;
	}
	
	
	/**
	 * storeNotifications Inserts notification texts into people's storage, used by other extensions
	 *
	 * @param array $notifications Array of FKU\FkuPeople\Domain\Model\Notification
	 * @param array $notificationTexts Array of single notification text elements to be sent to all users
	 * @return void
	 */
	public function storeNotifications($notifications, $notificationTexts) {
		$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$personRepository = $objectManager->get(PersonRepository::class);
		$userRepository = $objectManager->get(UserRepository::class);

		$footer = 'Dies ist eine automatische Nachricht, basierend auf Ihren persönlichen Einstellungen für sofortige Benachrichtigungen auf www.fku.ch. Bitte nicht darauf antworten.';
		$message = $this->prepareMail($notificationTexts, $footer);
		
		// send e-mail or store notification text in database
		$fullText = implode($this->separation, $notificationTexts).$this->separation;
		foreach ($notifications as $notification) {
			$user = $notification->getUser();
			switch ($notification->getTiming()) {
				case 0:
					if (! $this->settings['notificationBlocker']) {
						if ($DBID = $user->getTxFkupeopleFkudbid()) {
							$person = $personRepository->findByUid($DBID);
							if ($mail = $person->getEmail()) {
								$message->to(new Address($mail, $person->getFirstname().' '.$person->getLastname()));
								$message->send();
							}
						}
					}
					break;
				case 1:
					$notifCache = $user->getTxFkupeopleNotificationCacheday();
					$user->setTxFkupeopleNotificationCacheday($notifCache.$fullText);
					$userRepository->update($user);
					break;
				case 2:
					$notifCache = $user->getTxFkupeopleNotificationCacheweek();
					$user->setTxFkupeopleNotificationCacheweek($notifCache.$fullText);
					$userRepository->update($user);
					break;
			}
		}
		return true;
	}


	/**
	 * sendImmediateMails Sends notification e-mails for rules with timing = immediate, used by other extensions
	 *
	 * @param \array $users Array of \FKU\FkuPeople\Domain\Model\User
	 * @param \string $mailText Main content of notification
	 * @return void
	 */
	public function sendImmediateMails($users, $mailText) {
		if ($this->settings['notificationBlocker']) {
			// Avoid sending any notifications
			return true;
		}

		$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$personRepository = $objectManager->get(PersonRepository::class);

		foreach ($users as $user) {
			if ($DBID = $user->getTxFkupeopleFkudbid()) {
				$person = $personRepository->findByUid($DBID);
				if ($mail = $person->getEmail()) {
					$footer .= 'Dies ist eine automatische Nachricht, basierend auf Ihren persönlichen Einstellungen für sofortige Benachrichtigungen auf www.fku.ch. Bitte nicht darauf antworten.';
					$message = $this->prepareMail($mailText, $footer);
					$message->to(new Address($mail, $person->getFirstname().' '.$person->getLastname()));
					$message->send();
					return $message->isSent();
				}
			}
		}
	}
	

	/**
	 * prepareMail
	 *
	 * @param mixed $notificationTexts String or array of single notification text elements to be sent to users
	 * @param string $footerText
	 * @return MailMessage
	 */
	public function prepareMail($notificationTexts, $footerText = '') {
		if (is_string($notificationTexts)) {
			$notificationTexts = explode($this->separation, $notificationTexts);
			if (trim(end($notificationTexts)) == '') {
				array_pop($notificationTexts);
			}
		}
		
		if ($footerText == '') {
			$footerText = 'Dies ist eine automatische Nachricht, basierend auf Ihren persönlichen Einstellungen für Benachrichtigungen auf www.fku.ch. Bitte nicht darauf antworten.';
		}
		
		$textPlain = 'Website-Mitteilungen'.chr(13).chr(13);
		$textPlain .= implode($this->separation, $notificationTexts).$this->separation;
		$textPlain .= $footerText;
		$textHtml = '<html>'.chr(13).'<head>'.chr(13).'<style>'.chr(13).'body {font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 14px;}'.chr(13).'</style>'.chr(13).'</head>'.chr(13).'<body><b>Website-Mitteilungen</b><br /><br />';
		$textHtml .= '<p>'.implode('</p><hr><p>', $notificationTexts).'</p><hr>';
		$textHtml .= '<p>'.$footerText.'</p></body></html>';

		$message = GeneralUtility::makeInstance(MailMessage::class);
		$message
			->from(new Address('notification@fku.ch', 'FKU-Benachrichtigung'))
			->subject('Website-Mitteilungen')
			->text($textPlain)
			->html($textHtml);
		
		return $message;
	}
}
?>