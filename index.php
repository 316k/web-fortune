<!DOCTYPE html>
<html>
    <head>
    
    </head>
    <body>
        <header>
            <h1>Welcome to web-fortune !</h1>
            <small>~ Helping people loose their time since 1905 ~ </small>
        </header>
        <h2>Why should you use web-fortune.org ?</h2>
        <p>This service aims to be an emergency fallback for when the <code>fortune</code> UNIX program is unreachable and you are bored. For example :</p>
        <ul>
            <li>You are at work and your code is compiling (or not)</li>
            <li>You are using a friend's laptop running under Windope and you have too much time</li>
            <li>You lost your root password and you cannot install anything anymore</li>
        </ul>
        <p>web-fortune.org can also be used to entertain visitors on your website :<p>
        <code>
            &lt;?php
            echo file_get_contents('http://web-fortune.org/fortune.php?computers');
            ?&gt;
        </code>
        <h2>How to use web-fortune.org ?</h2>
        <p>It's pretty simple.
        <br />
        Just go click on one of the many centers of interest below (e.g. <a href="http://web-fortune.org/fortune.php?html&amp;computers">computers</a>)</p><p>For access from a terminal : </p>
        <code>
            curl http://web-fortune.org/fortune.php?computers
        </code>
        <h2>Available fortune files</h2>
        <ul>
            <li><a href="fortune.php?html&amp;all"><b>All</b></a> <small><a href="fortune.php?all">[raw text]</a></small></li>
            <?php 
            $fortune_files = array();
            foreach(new DirectoryIterator('fortunes') as $file) {
                if(!$file->isDot() && $file->isFile()) {
                    $fortune_files[] = (string) $file;
                    echo '';
                }
            }
            
            sort($fortune_files);
            
            foreach($fortune_files as $file): ?>
                <li><a href="fortune.php?html&amp;file=<?php echo $file ?>"><?php echo $file ?></a> <small><a href="fortune.php?file=<?php echo $file ?>">[raw text]</a></small></li>
            <?php endforeach; ?>
        </ul>
    </body>
