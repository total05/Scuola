#!/usr/bin/perl
@cognomi3Ait=('alpago', 'banica', 'camilotto', 'casetta', 'cioruta', 'drigo', 'duggal', 'forlin', 'gobbato', 'granzotto', 'hu', 'ion', 'moras', 'nalesso', 'nani', 'pasquali', 'peruzzetto', 'pozza', 'scali', 'schipor', 'singhm', 'singhs', 'souto', 'toffoli', 'voinea', 'zaccarin');
@cognomi4Ait=('ariton', 'baccichetto', 'brugnera', 'bucciol', 'casagrande', 'depra', 'gerola', 'granzotto', 'kumaraku', 'legdah', 'marchetto', 'nuzzolese', 'orlando', 'pagotto', 'pisano', 'stabile', 'trevisan', 'viotto', 'zago');
@cognomi5Ait=('alessandrini', 'bellomo', 'biasi', 'busato', 'canal', 'cescon', 'chen', 'coden', 'codognotto', 'faloppa', 'lefi', 'masier', 'nadifi', 'pallaro', 'parcianello', 'piovesan', 'serafin', 'tanasa', 'tesolin', 'tesserin', 'zanutto');
@estensioni=('.java', 'StringTokenizer.java'); # indicare le estensioni dei file; i file .png verranno solo elencati

$nomelistato='0listato.txt';
$nomeelencolistato='0elencolistato.txt';

push @cognomi,@cognomi4Ait; # indicare la classe

open(F,">$nomelistato");
open(FE, ">$nomeelencolistato");
print FE "ELABORATI NON CONSEGNATI\n";
for ($c=0; $c<=$#cognomi; $c++){
   for ($e=0; $e<=$#estensioni; $e++) {
      if (substr($estensioni[$e], -4) eq "java") {
         $cognomi[$c]=ucfirst($cognomi[$c]);
      }
      $nomefile=$cognomi[$c].$estensioni[$e];
      if (-e $nomefile){
         if (substr($estensioni[$e],-3) ne 'png') {
            system "dos2unix $nomefile 2>/dev/null";
            system "sed -i 's/è/e/g' $nomefile";
            system "sed -i 's/à/a/g' $nomefile";
            system "sed -i 's/ò/o/g' $nomefile";
            system "sed -i 's/ù/u/g' $nomefile";
            system "sed -i 's/ì/i/g' $nomefile";
            system "sed -i 's/é/e/g' $nomefile";
            if ($estensioni[$e]=="sql") {
               system "sed -i '/^--/d' $nomefile";
               system "sed -i '/./!d' $nomefile";
            }
            print F "AAAAAAALLINEADESTRA";
            print F $nomefile."\n";
            open(L,"<$nomefile");
            while(<L>){
               print F $_
            }
         }
         close(L);
         print F "\n";
      } else {
         print $nomefile." (non consegnato)\n";
         print F $nomefile."\n(non consegnato)\n";
         print FE $nomefile." (non consegnato)\n";
      }
   }
   print F "###pagina###";
}
   print FE "###pagina###\n";
close(F);
close(FE);
