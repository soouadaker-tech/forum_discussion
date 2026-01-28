<?php
function bbcode_to_html($text) {
    // Remplacer les balises BBCode par HTML
    $bbcodes = [
        '/

\[b\]

(.*?)

\[\/b\]

/is' => '<strong>$1</strong>',
        '/

\[i\]

(.*?)

\[\/i\]

/is' => '<em>$1</em>',
        '/

\[u\]

(.*?)

\[\/u\]

/is' => '<u>$1</u>',
        '/

\[url=(.*?)\]

(.*?)

\[\/url\]

/is' => '<a href="$1" target="_blank">$2</a>',
        '/

\[img\]

(.*?)

\[\/img\]

/is' => '<img src="$1" alt="Image" class="img-fluid">',
        '/

\[quote\]

(.*?)

\[\/quote\]

/is' => '<blockquote class="blockquote">$1</blockquote>',
        '/

\[code\]

(.*?)

\[\/code\]

/is' => '<pre><code>$1</code></pre>',
    ];

    foreach ($bbcodes as $pattern => $replacement) {
        $text = preg_replace($pattern, $replacement, $text);
    }

    // Convertir les retours à la ligne en <br>
    return nl2br($text);
}
?>
