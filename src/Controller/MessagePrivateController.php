<?php

namespace Drupal\message_private\Controller;

use Drupal\Core\Url;
use Drupal\user\entity\User;
use Drupal\Core\Controller\ControllerBase;
use Drupal\message\Entity\Message;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\message\MessageTemplateInterface;

/**
 * Controller for viewing private messages.
 */
class MessagePrivateController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * The access handler object.
   *
   * @var \Drupal\Core\Entity\EntityAccessControlHandlerInterface
   */
  private $accessHandler;

  /**
   * The entity manager service.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * Constructs a MessageUiController object.
   */
  public function __construct() {
    $this->entityManager = \Drupal::entityManager();
    $this->accessHandler = \Drupal::entityManager()->getAccessControlHandler('message');
  }

  /**
   * Generates output of all messages sent to the current user
   *
   *
   * @return
   *   A render array for a list of the messages;
   */
  public function inBox($user) {
    $messages = array();

    // Get messages sent to the current user
    // Return build array.
    if (!empty($messages)) {
      return array(
        '#theme' => 'message_private__inbox',
        '#messages' => $messages
      );
    }
    else {
      $url = Url::fromRoute('message.template_add');
      return array(
        '#markup' => 'You have no messages in your inbox. Try sending a message to someone <a href="/' . $url->getInternalPath() . '">sending a message to someone</a>.'
      );
    }
  }

  /**
   * Generates form output for adding a new message entity of message_template.
   *
   * @param \Drupal\message\MessageTemplateInterface $message_template
   *   The message template object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function sent($user) {
    // Return build array.
    if (!empty($messages)) {
      return array(
        '#theme' => 'message_private__inbox',
        '#messages' => $messages
      );
    }
    else {
      $url = Url::fromRoute('message.template_add');
      return array(
        '#markup' => 'You have no messages in your inbox. Try sending a message to someone <a href="/' . $url->getInternalPath() . '">sending a message to someone</a>.'
      );
    }
  }


}
