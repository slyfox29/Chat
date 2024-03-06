<?php
// Read messages from a file or database and return as HTML
$messages = file_get_contents('messages.txt');
$messagesArray = explode(PHP_EOL, $messages);
?>

<div class="card">
    <div class="card-body">
        <?php foreach ($messagesArray as $message): ?>
            <?php if (!empty($message)): ?>
                <div class="card-text"><?php echo $message; ?></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
