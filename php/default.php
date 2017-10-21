
<p ><b><span style='font-size:26.0pt;line-height:
115%'>Default methods</span></b></p>

<p> <a name="introduction"></a> Normalement, une interface java contient un ensemble des méthodes, et chaque classe qui implémente cette interface doit donner une implémentation de toutes ses méthodes.</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p>Java 8 Introduit un nouveau concept d’implémentation des méthodes « par default » pour les interfaces.Ce nouveau mécanismenous permet d’ajouter des implémentations par default au interfaces sans être obligé de donner une implémentation dans la classe à chaque fois.</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p>Par exemple, les interface ‘List’ n’a pas la déclaration du méthode ‘sort’,alors si on l’ajoute on va perturber le fonctionnement de toutes les implémentations des framworks List.
La méthode sort par exemple est nouvelle dans Java 8 et définit comme ceci 
<pre><span class="public">default  void </span>sort(<span class="system">Comparator</span><&#63;  super E >  c){
 <span class="system">Collections</span>.sort(this, c); 
}</pre>
</p>

<p> <a name="syntaxe"></a><b><span style='font-size:18.0pt;line-height:115%;font-family:"Georgia","serif";color:#244061'>Syntax</span></b></p>
<p>Les méthodes par default commence par le mot ‘default’ et contient un corps comme une méthode déclaré dans un classe.</p>

<p ><b><u><span lang=EN-US style='font-size:14.0pt;
line-height:115%'>Exemple&nbsp;:</span></u></b></p>
<pre>
<span class="public">public interface </span>A {
<span class="public">default void </span>print(){
      <span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"this is A!"</span>);
   }
}
</pre>
<pre><span class="public">public interface </span>B {
<span class="public">default void </span>print(){
      <span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"this is B!"</span>);
   }}</pre>
<p><b><u><span style='font-size:14.0pt;
line-height:115%'>Problème</span></u></b>&nbsp;:</p>
<p>Avec les méthodes par default, il y a la possibilité d’avoir une classe implémente 2 interfaces avec la même méthode par default.</p>
<p>On a deux solutions pour ce problème :</p>
<p>•	Première solution consiste à créer une méthode propre qui remplace l'implémentation par défaut :</p>
<pre><span class="public">public class </span>C <span class="system">implements </span>A,B {
<span class="public">default void </span>print(){
      <span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"this is C!"</span>);
   }
}</pre>



<p>•	La deuxième solution c’est d’appeler la méthode par default d’interface spécifiée on utilisant super :</p>

<pre> <span class="public">public class </span>C <span class="system">implements </span>A,B {
<span class="public">default void </span>print(){
       A.super.print();
   }
}



</pre>
      

<p  style='margin-left:30.0pt'><span
style='font-size:14.0pt;line-height:115%;color:#C00000'>Remarque: Dans l’exemple si l’interface B hérite A, la classe C va implémenter la méthode de l’interface B.</span></p> 



<p ><b><span style='font-size:26.0pt;
line-height:115%'>Static Default methods</span></b></p>
<p>Avec Java 8 on peut aussi avoir des méthodes statiques par default : </p>

<pre><span class="public">public interface </span>A {
<span class="public">default void </span>print(){
      <span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"this is A!"</span>);
   }
	
 <span class="public"> Static void  </span>test(){
        <span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"test test!!"</span>);
}
}
</pre>

