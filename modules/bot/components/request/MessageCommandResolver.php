<?php

namespace app\modules\bot\components\request;

use TelegramBot\Api\Types\Update;
use app\modules\bot\models\Chat;

class MessageCommandResolver implements ICommandResolver
{
    public function resolveCommand(Update $update)
    {
        if ($message = $update->getMessage()) {
            $commandText = $message->getText();
        }

        if (!isset($commandText) && ($message = $update->getEditedMessage())) {
            $chat = $message->getChat();
            $commandText = $message->getText();
            \Yii::info('edited ' . $chat->getType(),'xxxxx');
        }

        return $commandText ?? null;
    }
}
