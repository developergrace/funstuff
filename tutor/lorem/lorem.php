<?php 
    $paragraph = $_POST['paragraph']; 
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Closers Ipsum</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
            <div id="image">
                <img src="abc.gif" alt="Glengarry Glen Ross - Always Be Closing Scene">
            </div>
            <div class="form">
                <h1>Ipsum's For <span style="color:#cc0000">Closers Only</span></h1>
                <form action="" method="POST">
                    <label for="paragraph">Number of Paragraphs:</label>
                    <select name="paragraph" id="paragraph" required>
                        <?php for($x = 1; $x <= 10; $x++): ?>
                        <option value="<?php echo $x; ?>" <?php echo $paragraph == $x ? 'selected' : null; ?>>
                        <?php echo $x; ?>
                        </option>
                        <?php endfor; ?>
                        </select>
                    <button>Submit</button>
                </form>

                <div class="output">
                    <?php
                        $array_raw = strtolower("Let me have your attention for a moment. So you’re talking about what? You’re talking about, bitching about that sale you shot, some son of a bitch that doesn’t want to buy, somebody that doesn’t want what you’re selling, some broad you’re trying to screw and so forth. Let’s talk about something important. Are they all here? Well, I’m going anyway. Let’s talk about something important. Put that coffee down. Coffee’s for closers only. Do you think I’m fucking with you? I am not fucking with you. I’m here from downtown. I’m here from Mitch and Murray. And I’m here on a mission of mercy. Your name’s Levene? You call yourself a salesman, you son of a bitch? You certainly don’t pal. Cause the good news is you’re fired. The bad news is you’ve got, all you got, just one week to regain your jobs, starting tonight. Starting with tonight’s sit. Oh, have I got your attention now? Good. Cause we’re adding a little something to this month’s sales contest. As you all know, first prize is a Cadillac El Dorado. Anyone want to see second prize? Second prize is a set of steak knives. Third prize is you’re fired. You get the picture? You’re laughing now? You got leads. Mitch and Murray paid good money. Get their names to sell them. You can’t close the leads you’re given, you can’t close shit, you are shit, hit the bricks pal and beat it ’cause you are going out. Cause you drove a Hyundai to get here tonight, I drove an eighty thousand dollar BMW. That’s my name. And your name is you’re wanting. And you can’t play in a man’s game. You can’t close them. And you go home and tell your wife your troubles. Because only one thing counts in this life. Get them to sign on the line which is dotted. You hear me ABC Always Be Closing Always Be Closing AIDA Attention Interest Decision Action Attention; do I have your attention? Interest; are you interested? I know you are because it’s fuck or walk. You close or you hit the bricks. Decision; have you made your decision for Christ? And action");
                        $array_clean = str_replace(array('.', ',', '?', '!', ':', ';'), '' , $array_raw);
                        $array_final = explode(' ', $array_clean);
                        $x = 0;

                        while($x < $paragraph) {
                            $lorem_paragraph = "";
                            $sent_amount = rand(5, 10);
                            $y = 0;

                            while($y < $sent_amount) {
                                $lorem_sentence = "";
                                $word_amount = rand(5, 20);
                                $z = 0;

                                while($z < $word_amount) {
                                    $total_words = count($array_final);
                                    $this_index = (rand(0,($total_words-1)));
                                    $lorem_sentence = $lorem_sentence . " " . $array_final[$this_index];
                                    $z++;
                                }

                                $lorem_paragraph = $lorem_paragraph . " " . ucfirst(trim($lorem_sentence)) . ".";
                                $y++;
                            }
                            echo "<p>" . ucfirst(trim($lorem_paragraph)) . "</p>";
                            $x++;
                        }
                    ?>
                </div>
            </div>
            <aside>
                <p>This lorem ipsum generator uses the script from Alec Baldwin's monlogue in <i>Glengarry Glen Ross</i> (1992).
                </p>
            </aside>
        </main>
    </body>
</html>