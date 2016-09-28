<?php 

function printsql($data){
	$pos = 0;
	$length = strlen($data);
	while($pos < $length)
	{
		$mail = substr($data,$pos,21);
		$pos += 21;
		$next = strpos($data,"lynda", $pos);
		if($next == 0)
			break;
		$pw = substr($data,$pos, $next-$pos);
		$pos = $next;
		echo "INSERT INTO `accounts` (`id`, `username`, `password`, `created`, `modified`) VALUES (NULL, '".$mail."', '".$pw."', '2016-09-12 00:00:00', '2016-09-12 00:00:00');";
	}
}

$data = 'lynda07@uni-kassel.de0F2H%mn7l?	
lynda08@uni-kassel.deC6S#P+0pG0	
lynda09@uni-kassel.derIMv2U0Q#0	
lynda10@uni-kassel.deW%qwdJ%9d%	
lynda11@uni-kassel.deJ+5Vc&1sC6	
lynda12@uni-kassel.dej0j#E2lZDU	
lynda13@uni-kassel.deLiL-Y+bl1F	
lynda14@uni-kassel.deYO4pkm#x$+	
lynda15@uni-kassel.deoFf!z17k-z	
lynda16@uni-kassel.deTYcTDs$4f&	
lynda17@uni-kassel.de$bSp4#lpdI	
lynda18@uni-kassel.de39p?CCV?sp	
lynda19@uni-kassel.decC6ONb1WO+	
lynda20@uni-kassel.de!&Ny7tzxBt	
lynda21@uni-kassel.deKKGnryu1&1	
lynda22@uni-kassel.de!nTeky5H7T	
lynda23@uni-kassel.dePW0Bwem6J#	
lynda24@uni-kassel.de*IFfjly5H!	
lynda25@uni-kassel.deC1mf5VUZ-0	
lynda26@uni-kassel.de-pQuG*e7*R	
lynda27@uni-kassel.de=vpl2J0)u1g	
lynda28@uni-kassel.deLYNed3r?fT	
lynda29@uni-kassel.dew*T%?8b2Ys	
lynda30@uni-kassel.dey7P&*Eo56c
lynda31@uni-kassel.de600l-n$&IU	
lynda32@uni-kassel.deL5-m0LPgVA	
lynda33@uni-kassel.de0nK-SBRB8d	
lynda34@uni-kassel.de%1rOZpmFS2	
lynda35@uni-kassel.de*FAf?h0a4X	
lynda36@uni-kassel.dedj?QJL18%0	
lynda37@uni-kassel.deC0*SaZm!#7	
lynda38@uni-kassel.deCI#ho1?Q$m	
lynda39@uni-kassel.deRL1O6dtC-z	
lynda40@uni-kassel.det3!V*7qcBi	
lynda41@uni-kassel.deOgH&C5Cn%e	
lynda42@uni-kassel.de6f0!2pX#Hu	
lynda43@uni-kassel.de9O!X2zabot	
lynda44@uni-kassel.dexK72spHQ+G	
lynda45@uni-kassel.de$grJ8WMhP$	
lynda46@uni-kassel.del9VOI6D%l5	
lynda47@uni-kassel.de4o$pO?Vv8D	
lynda49@uni-kassel.deqN0i$VOOB2	
lynda50@uni-kassel.de&xpHn-Im7t	
lynda51@uni-kassel.detKlQ-&BN1*	
lynda52@uni-kassel.deBofcNng5L*	
lynda53@uni-kassel.de$YI-q5-ph&	
lynda54@uni-kassel.deWWuX0p+rAT	
lynda55@uni-kassel.derf*KJ9mdmg	
lynda56@uni-kassel.de02o?xrX#aN	
lynda57@uni-kassel.deD+1kKovnLQ	
lynda58@uni-kassel.de%3puBnHjR-	
lynda59@uni-kassel.deYftm$6MTVY	
lynda60@uni-kassel.deduZo%Z6ed!	
lynda61@uni-kassel.de70N&&RhSFc
lynda62@uni-kassel.demqRJ&BCAQ0	
lynda63@uni-kassel.dex-MOx0HwQh	
lynda64@uni-kassel.de#0P3c4p-L&	
lynda65@uni-kassel.deLG7kt*0nfw	
lynda66@uni-kassel.deBf0Cs?X-!t	
lynda67@uni-kassel.deOoD2J8H+Pd	
lynda68@uni-kassel.de*i8BsQ+0TZ	
lynda69@uni-kassel.derzP%R!O76Y	
lynda70@uni-kassel.deIDhCE41x+X	
lynda71@uni-kassel.dezOSaV7ZC#k	
lynda72@uni-kassel.de*6TS%G-YvT	
lynda73@uni-kassel.de47*2IUbFhQ	
lynda74@uni-kassel.deR5G00ke#hu	
lynda75@uni-kassel.de0#zR$FtCv8	
lynda76@uni-kassel.deq5-&C5Y*7S	
lynda77@uni-kassel.det+OJ9zeFE#	
lynda78@uni-kassel.deY&Y1#*Os%!	
lynda79@uni-kassel.de7Dx6%rsH5D	
lynda80@uni-kassel.deC6G??by0lJ';

printsql($data);

?>