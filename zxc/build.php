<?php
shell_exec(trim('git clone https://github.com/rok9ru/trpo-core.git ./core'));
file_put_contents('./version',trim(shell_exec('git symbolic-ref --short -q HEAD')));
