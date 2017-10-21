
<p ><b><span style='font-size:26.0pt;line-height:
115%'>Lambda expressions</span></b></p>
<a name="introduction"> </a>
<p>Un des plus grandes fonctionnalités du java 8, Lambda expressions facilite la programmation fonctionnel et simplifie le développement.</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p>Comme on a vu dans l’introduction de la programmation fonctionnelle, passer le code est actuellement verbeux en Java. Avec Lambda, maintenant on peut passer le code d’une manière concis, sans avoir utilisé les classes anonymes ou écrire des classes que vous n’utilisez qu’une seule fois dans votre code.</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p>Le résultat est un code plus claire, plus concise et plus flexible. Par exemple on peut utiliser Lambda expression pour créer un comparateur objet :</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font color="#002060"><font face="Arial, serif"><font size="4" style="font-size: 14pt"><b>Avant&nbsp;:</b></font></font></font></p>
<pre>Comparator<Apple>byWeight = new Comparator<Apple>() {
publicint compare(Apple a1, Apple a2){ 
return a1.getWeight().compareTo(a2.getWeight()); 
}
 };</pre>

<p style="margin-bottom: 0.35cm; line-height: 115%"><font color="#002060"><font face="Arial, serif"><font size="4" style="font-size: 14pt"><b>Après(Lambda expression)&nbsp;:</b></font></font></font></p>
<pre>Comparator<Apple>byWeight =  
(Apple a1, Apple a2) ->a1.getWeight().compareTo(a2.getWeight());
</pre>


<p  style='margin-left:30.0pt'><span
style='font-size:14.0pt;line-height:115%;color:#C00000'>Remarque que le code est plus simple après l’utilisation des Lambda expressions.</span> </p>

<a name="syntaxe"></a>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font color="#365f91"><font size="6" style="font-size: 22pt"><span lang="fr-FR"><b>Syntaxe&nbsp;:</b></span></font></font></p>	
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p>Une expression lambda peut être comprise comme une représentation concise d'une classe anonyme qui peut être passé autour:</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
 <p> • Il n’a pas de nom comme une méthode normale.</p>
  <p>• Capable d’être passé comme un argument d’une méthode ou une valeur dans un variable.</p>
 <p> • Concise : moins de code àécrire contrairement aux classes anonymes.</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p>Une Lambda expression est composée des paramètres, une flèche, et un corps :</p> 
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p style="margin-bottom: 0cm; line-height: 100%">     <font face="Courier New, serif"><font size="2" style="font-size: 10pt"><font color="#ff0000"><font size="4" style="font-size: 14pt"><span lang="fr-FR"><b>(Paramètres)</b></span></font></font><font size="4" style="font-size: 14pt"><span lang="fr-FR"><b>
</b></span></font><font color="#00b050"><font size="4" style="font-size: 14pt"><span lang="fr-FR"><b>-</b></span></font></font><font color="#00b050"><font size="2" style="font-size: 11pt"><b>&gt;</b></font></font><font size="2" style="font-size: 11pt"><b>
</b></font><font color="#4f81bd"><font size="4" style="font-size: 14pt"><b>Corps
de l’expression</b></font></font></font></font></p>

<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
 
<p>•	Une liste des paramètres : dans l’exemple on a les paramètres du méthode compare d’un Comparator.</p>
<p>•	La flèche : sépare les paramètres et le corps.</p>
<p>•	Le corps : dans l’exemple il compare deux objets, l’expression est considérée comme la valeur du retour.</p>


<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>

<p>Ci-dessous sont les caractéristiques importantes d’une expression lambda :</p>
<p>•	Déclarations du type est optionnel pour les paramètres. Les parenthèses sont optionnelles et requis uniquement pour multiples paramètres.</p>
<p>•	Si le corps a une seule instruction les accolades ne sont pas nécessaires.</p>
<p>•	Le mot clé return n’est pas nécessaire si on a une seule instruction.</p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<a name="exemple"></a>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font color="#365f91"><font size="6" style="font-size: 22pt"><span lang="fr-FR"><b>Exemples
d’utilisations&nbsp;:</b></span></font></font></p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p><b>Cas d’utilisation Examples</b></p>

<p><b>Boolean:</b></p><pre>(List<String> list) ->list.isEmpty()</pre>

<p><b>création des objets :</b></p><pre>() -> new Apple(10)</pre>

<p><b>consummation:</b></p><pre>(Apple a) -> {
System.out.println(a.getWeight()); 
}</pre>
                                                                                     

<p><b>selection/extraction:</b></p><pre>(String s) ->s.length()</pre>

<p><b>Combinaison des valeurs :</b></p><pre>(inta, int b) -> a * b</pre>

<p><b>Comparaison:</b></p>  <pre> (Apple a1, Apple a2) ->a1.getWeight().compareTo(a2.getWeight())</pre>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<p style="margin-bottom: 0.35cm; line-height: 115%"><font color="#365f91"><font size="6" style="font-size: 22pt"><span lang="fr-FR"><b>Lambda
expressions En Action</b></span></font></font></p>
<p class=MsoListParagraphCxSpMiddle><b><span style='font-size:26.0pt;
line-height:115%'>&nbsp;</span></b></p>
<pre><span class="public">public class</span> Java8Tester{
<span class="public">public static void </span>main(String args[]){


<span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"13 + 7 = "</span>+ operate(13,7,(inta,int b)->a+b));

<span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"19 x 5 = "</span>+operate(19,5,(inta,int b)->a*b));



Greetingmessage1 = message -><span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"Hello "</span>+ message);
		
Greetingmessage2 = message-><span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"Hello "</span>+ message);

		
message1.sayMessage(<span class="aff">"khalid"</span>);
message2.sayMessage(<span class="aff">"anass"</span>);

}


  <span class="public">interface </span> Greeting{
<span class="public">void</span>  sayMessage(String message);
}

<span class="public">interface</span>  MathOperation{
<span class="system">int</span> operation(<span class="system">int</span> a,<span class="system">int</span> b);

<span class="system">int</span> operate(<span class="system">int</span> a,<span class="system">int</span> b,MathOperation   mathOperation){
<span class="public">return</span> mathOperation.operation(a, b);

</pre

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

