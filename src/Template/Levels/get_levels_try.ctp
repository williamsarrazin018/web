<dl>
    <?php foreach ($levels as $level): ?>
        <li value="<?php echo $level['id']; ?>"><?php echo $level['name']; ?>
            <dl>
                <?php foreach ($level->chambers as $chamber): ?>
                    <li value="<?php echo $chamber['id']; ?>"><?php echo $chamber['name']; ?>
                <?php endforeach; ?>            
            </dl>
        </li>
    <?php endforeach; ?>
</dl>
