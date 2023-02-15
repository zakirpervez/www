<?php
ini_set('display_errors', 1);
echo "<h1>Encryption decryption</h1>";

$encrypted = "rldb:gh%7BA\/vzVHeJNKL4QtOLHdPt8aHzbjrN6\/1zGU6EpLW1jrC\/fbToxki7usBHWlXCD1cayiBGdGshy1oPNIelq\/wXqpi6OcySGmKrzB4dMQjC8LIH\/GFHKbfl+\/q7JQNBWhY1hmEQtd0th1OFKtkFCRTzWXbjh5ZuSQxGWQXoqA6yxkGb\/47Hw8BFQfjwbPvZHOLdRzSoMdI43S1emfWRdJCl1Y6yuqEQNEqaK0kDALkWRk0+74B0IdSTuLmc\/xtN6uZ7LoeIeRZAV\/vlcfykJtELkzBmKcK46pHAdxPPiTlvtONzIMxCW26uWzzbzd+AbJZc073KlpNp6F3N5UjATFppKCFqpJNhWZhElY2rpP4D71FTysYtCr\/g8IGJDkOK\/kpzxZBRB2Oh\/oYHZbj1VR7krnj1lye+cbm+svbPPGCjIF+9FuXwSnxeR2oU6ASMztTIQA44Zk7PM\/QuZ9zwTPuDuBq8paHvavJyJ3bohsDxYH1SOG1dhOzbjRPUB9A2VNpHpQVLG1AV0rN8DyXPdB3qzUKnZ7O9qDbycAaZ6MC8vV03slc0NrrSV4EJon7mkdGajkykBacEfKcSCMbN\/8dAvRca36GKv506u8QojYETO6HNX0tD\/xOehXCnAiDb7f2as2ADgopKlQW\/\/Idtq8lg6CzfS78VdnfgeSvlVgtqj8Dom+dM1qMdVCCt6ujuuSsScAaZ6MC8vV3+dl09AOIfoi3WIAj84VXycAaZ6MC8vV1yyG8wczFSophDCrS6Q2MGzrPXMnP2yQC+cHOzLBujXCX\/nSUsn8oq\/2TuR41ac\/2Wq6cKUKxYOARGyuSQPthuK8xIznaw2+89mkBnnAw3tMtrGMPdczvWMbmpoZMQjlTqpnP+4K9R674Dtkhm38zAACt+iVen2B+SL8Sd2BJU1fh2uBwe1X6CcUwvrRXhPiPNRmHZ02r65j5+phOOERditYaoHE80PyE\/IDpjf7KXFXzgtyju6TSnOGtd2PZZSIlxCTjOXLhCv5i2mYggYociWNLvhvkRF+IBNiqS2QAzzxZrAPGE1KGu%7D";
echo "orignal: ". $encrypted. "<br>";
$search = "rldb:gh%7B";
$replace = '';
$encrypted = str_replace($search, $replace, $encrypted);
$search = "%7D";
$encrypted = str_replace($search, $replace, $encrypted);
echo "trailing: ".$encrypted. "<br>";
$ldbSecrets = "a1f0307d3db3c470bc5e451bc9897a10";
echo mcrypt_decrypt(MCRYPT_BLOWFISH, $ldbSecrets, base64_decode($encrypted), MCRYPT_MODE_ECB);
