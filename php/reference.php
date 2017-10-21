
<p><b><span style='font-size:26.0pt;line-height:
115%'>Références de méthodes</span></b></p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Les références de méthodes sont utiles pour remplacer des expressions Lambda qui font appel à une méthode qui existe déjà.</p> 
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Par exemple on peut remplacer :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre> Function<Integer, String>toString = i ->String.valueOf(i);</pre>

<p>Par:</p>
<pre>Function<Integer, String>toString = String::valueOf;</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Mais pourquoi utiliser les références de méthodes ? On peut les considérée comme un raccourci pour les lambda qui appelle une seule méthode existant.</p>
<p><b><span
style='font-size:22.0pt;line-height:115%;color:#365F91'>Syntaxe :</span></b></p>
<p>Lorsqu’on a besoin d’une référence de méthode, la référence cible est placé avant le séparateur :: et la méthode est placé après.</p> 

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b><span
style='font-size:18.0pt;line-height:115%;color:#365F91'>Construction de la référencede méthode</span></b></p>


<p>Il y a trois sortes des références de méthodes :</p>

<p>1. Une référence à une méthode statique.</p>
<p>Par exemple la méthode parseInt de Interger : <b>Integer::parseInt</b></p>
<p>2. Une référence à une instance de méthode d’un type.</p>
<p>Par exemple la méthode lengthde String : <b>String::length</b></p>
<p>3. Une référence à une instance de méthode d’un objet existant.</p>
<p>Par exemple on suppose qu’on a un variable Nom qui contient un objet de type String et qui supporte une méthodelength :   <b>Nom::length</b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b><span
style='font-size:18.0pt;line-height:115%;color:#365F91'>Exemples des Lambdas et leur référence de méthode équivalente :</span></b></p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>
<table class="table">
<caption><b>Lambda référence de Méthode équivalente</b></caption>

<tbody>
<tr><td>(Apple a) ->a.getWeight()</td><td> Apple::getWeight</td></tr>
<tr><td>() ->Thread.currentThread().dumpStack()</td><td> Thread.currentThread()::dumpStack</td></tr>
<tr><td>(str, i) ->str.substring(i)</td><td> String::substring</td></tr>
<tr><td>(String s) ->System.out.println(s) </td><td>  System.out::println</td></tr>
<tbody>
</table>
</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b><span
style='font-size:14.0pt;line-height:115%;color:red'>Remarque :</span></b></p>
<p>On peut créer une référence pour un constructeur existant on utilisant le mot clé <b>new</b>. Ça marche similairement aux méthodes statiques :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
Supplier<Apple> c1 = Apple::new; 
<span class="aff">//equivalent à Supplier<Apple> c1 = new Apple();</span>
Apple a1=c1.get();
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
