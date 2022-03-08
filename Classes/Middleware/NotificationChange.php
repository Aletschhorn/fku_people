<?php
namespace FKU\FkuPeople\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Http\Stream;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use FKU\FkuPeople\Domain\Repository\UserRepository;
use FKU\FkuPeople\Domain\Repository\NotificationRepository;

class NotificationChange implements MiddlewareInterface {
	 /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process (ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {		
		if (!isset($request->getQueryParams()['notificationChange'])) {
            return $handler->handle($request);
        }
		
		$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		$userRepository = $objectManager->get(UserRepository::class);

		$success = false;
		$action = $request->getQueryParams()['notificationChange'];
		
		if ($action == 'settings') {
			$value = $_POST['status'];
			$type = $_POST['type'];
			if ($userId = $GLOBALS['TSFE']->fe_user->user['uid']) {
				if ($user = $userRepository->findByUid($userId)) {
					switch ((string)$type) {
						case 'hour':
							$user->setTxFkupeopleNotificationHour($value);
							break;
						case 'weekday':
							$user->setTxFkupeopleNotificationWeekday($value);
							break;
						case 'weekdayhour':
							$user->setTxFkupeopleNotificationWeekdayhour($value);
							break;
					}
					$userRepository->update($user);
	
					$objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class)->persistAll();
					$objectManager->get(\TYPO3\CMS\Extbase\Service\CacheService::class)->clearPageCache(['527']);
		
					$success = true;
				}
			}
		}
		
		if ($action == 'days') {
			$status = $_POST['status'];
			$uid = $_POST['id'];
			$notificationRepository = $objectManager->get(NotificationRepository::class);
			if ($reporting = $notificationRepository->findByUid($uid)) {
				$reporting->setDays($status);
				$notificationRepository->update($reporting);
	
				$objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class)->persistAll();
				$objectManager->get(\TYPO3\CMS\Extbase\Service\CacheService::class)->clearPageCache(['527']);
	
				$success = true;
			}		
		}
		
		$body = new Stream('php://temp', 'rw');
        $body->write($success);
		return (new Response())
                ->withHeader('content-type', 'text/plain; charset=utf-8')
                ->withBody($body)
                ->withStatus(200);
	}
}

?>