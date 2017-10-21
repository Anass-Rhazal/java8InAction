
<p><b><span style='font-size:26.0pt;line-height:
115%'>Functional interfaces</span></b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<a name="introduction"></a>
<p name="introduction"><b><span style='font-size:22.0pt;line-height:115%;
color:#365F91'>Introduction</span></b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p>Dans l’exemple précédant on a utilisé des interfaces avec exactement une seule méthode abstraite, ces interfaces sont appelés<b> les interfaces fonctionnelles (functional interfaces)</b>.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Les expressions lambda correspondent en fait à des types spécifiés par ces interfaces.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><span style='font-size:14.0pt;line-height:115%;color:red'>Remarque : une interface qui spécifie une seule méthode abstraite est toujours une interface fonctionnelle même si elle a plusieurs méthodes par default.</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Par exemple si on prend les interfaces suivant :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<pre><span class="public">public interface </span>Adder{         
        				<span class="system">	int </span>add(<span class="system">int </span>a, <span class="system">int </span>b);	
                        	}
<span class="public">public interface </span>SmartAdder <span class="system">extends </span>Adder{			
						    <span class="system">int </span>add(<span class="system">double </span>a, <span class="system">double </span>b);	
                           }
<span class="public">public interface </span>Nothing{	
						}</pre>
               <p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>         
<p>Parmi ces interfaces, Adder est la seule interface fonctionnelle.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p>SmartAdder n’est pas une interface fonctionnelle parce qu’elle spécifie deux méthodes abstraites : add et la méthode add hérité de l’interface Adder.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p>Nothing n’est pas une interface fonctionnelle, car elle ne déclare aucune méthode abstraite.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<a name="interface"></a>
<p name="interface"><b><span style='font-size:22.0pt;line-height:115%;
color:#365F91'>Lambda expressions et les interfaces fonctionnelles</span></b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Au début de cette partie, on a dit qu’une interface fonctionnelle spécifie exactement une seule méthode abstraite. Les interfaces fonctionnelles sont utiles parce que la signature de la méthode abstraite peut décrire la signature d’expression Lambda, Cette signature est appelé le descripteur de fonction.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p>Donc pour utiliser des expressions lamda différents, on a besoin d’un ensemble des interfaces fonctionnelles déjà disponible dans la Java  API comme Comparable, Predicate etc…</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Parmi les nouvelles interfaces fonctionnelles introduites dans java.util.function package :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>•	Predicate :</b></p>
<p>L’interface <b>Predicate<T></b>définit une méthode abstraite appelé <b>test </b>qui accepte un objet générique de type T et renvoie un booléen :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
		<span class="aff">@FunctionalInterface</span>
<span class="public">public interface </span>Predicate<T>{
<span class="system">boolean </span>test(T t);
}
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>On peut utiliser cette interface pour représenter une expression booléen qui utilise un argument de type T, par exemple :</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<pre>

		<span class="public">public static<T></span> <span class="system">List<T></span>filter(<span class="system">List<T></span>list, Predicate<T> p) {
	<span class="system">List<T></span> results = new ArrayList< >();
<span class="system">for</span>(T s: list){
<span class="system">if</span>(p.test(s)){
		results.add(s);
}
}
<span class="public">return </span>results;
		}
<span class="aff">//cette prédicat pour tester si un argument String est vide ou non.</span>
	Predicate<<span class="system">String</span>>nonEmptyStringPredicate = (<span class="system">String</span> s) -> !s.isEmpty();
<span class="aff">//après on utilise la méthode filter qu’on a défini au début.</span>
<span class="system">List<String> </span>nonEmpty = filter(listOfStrings, nonEmptyStringPredicate);
<span class="aff">//la méthode filter prend une liste et un prédicat comme arguments et renvoie une nouvelle liste tester par le prédicat.</span>
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>•	Consumer :</b></p>
<p>L’interface <b>Consumer<T></b> définitunméthode abstraite appelé <b>accept </b>qui prend un objet générique de type T et renvoie aucun résultat (void) :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>		<span class="aff">@FunctionalInterface</span>
<span class="public">public interface </span>Consumer<T>{
<span class="public">void</span> accept(T t);
}</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>On peut utiliser cette interface si on veut accéder un objet de type T et effectuer certaines opérations, par exemple :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
<span class="public">public static <T> void</span> forEach(List<T> list, Consumer<T> c) {
<span class="system">for</span>(T i: list){
	c.accept(i);
}
}
ForEach(Arrays.asList(1,2,3,4,5),(<span class="system">int</span> i) ->System.out.println(i));
<span class="aff">//la méthode forEach prend une liste et un Consumer comme arguments et applique la méthode accept du Consumer aux éléments de liste.
//dans ce cas, accept prend les éléments de la listes et les affiche.</span>
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>•	Function :</b></p>
<p>L’interface <b>Function<T,R></b> définit un méthode abstraite appelé <b>apply</b> qui prend un objet générique de type T et renvoie un objet générique de type R :</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>		<span class="aff">@FunctionalInterface</span>
<span class="public">public interface </span>Function<T,R>{
Rapply(T t);
}</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>On peut utiliser cette interface si on veut définir une Lambda qui mappe des informations de l’entrée à la sortie, par exemple :</p>
<p>Si on veut transformer une liste des chaines de caractères à une liste des nombres entiers contenant la longueur de chaque chaine :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
<span class="public">public static <T,R></span> List<R> map(List<T> list, Function<T,R> f) {
<span class="system">List<R></span> result = new ArrayList< >();
<span class="system">for</span>(T i: list){
	result.add(f.apply(i));
}
<span class="public">return </span>result;
}
<span class="system">List<Integer></span> l=map(Arrays.asListe(“lambdas”,”in ”,”action”) , (String s)- >s.length() );   
<span class="aff">/* l’expression lambda implémentée par la méthode apply renvoie la longueur de la chaine donnée. C’est-à-dire la liste l va contenir [7, 2, 6] */</span>
</pre>						
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>


<a name="compose" > </a> 
<p ><b><span
style='font-size:22.0pt;line-height:115%;color:#365F91'>Méthodes utiles pour composer les expressions Lambda</span></b></p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p>Plusieurs interfaces fonctionnelles in Java 8 contiennent des méthodes pratiques qui permettent de composer plusieurs expressions lambda pour construire des expressions plus compliquées. Spécifiquement les interfaces comme Comparator, Function et Predicate.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p>Vous pouvez vous demander comment il est possible pour une interface fonctionnelle d’avoir plus qu’une méthode abstraite : l’astuce est que ces méthodes que nous allons présenter sont des méthodes par default (voir le chapitre des méthodes par default).</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>•	Composition des Comparators :</b></p>
<p>On sait que l’interface Comparator utilise La methode statique Comparator.comparing pour retourner un Comparator :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
Comparator<Apple> c = Comparator.comparing(Apple::getWeight);
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>Ordre inversée :</b></p>
<p>Si on veut trier une liste de type Apple par poids décroissant, on n’a pas besoin de construire une autre instance de Comparator. L’interface inclut une méthode par default  <b>reversed()</b> qui inverse l’ordre de tri :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
Inventory.sort( comparing(Apple::getWeight).reversed() );
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>Chainage des Comparators :</b></p>
<p>Pendant le tri, si on trouve deux pommes avec le même poids, on peut construire un autre Comparateur pour enrichir la comparaison. Pour cela on utilise la méthode par default thenComparing qui prend une fonction comme argument et permet la méthode de sort d’avoir un Comparateur secondaire utilisé dans le cas d’égalité pour le premier comparateur :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
Inventory.sort( comparing(Apple::getWeight)
         .reversed() );<span class="aff">//tri par poids décroissant.</span>
.thenComparing(Apple::getCountry)) ;<span class="aff">/* tri par getCountry dans le cas d’egalite pour le premier comparateur */</span>
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>•	Composition des Predicates :</b></p>
<p>L’interface Predicatea trois méthodes qui permet de réutiliser des prédicats existants pour créer des prédicats plus compliquées.</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>Negate()</b> : on peut utiliser <b>negate()</b> pour retourner la negation d’un prédicat :</p>
	<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>Predicate<Apple>notRedApple = redApple.negate();
<span class="aff">/* negate() retourne la negation du prédicat redApple,c’est-à-dire la pomme qui est pas rouge */</span>
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>and()</b> :on peut combiner deux lambdas pour exprimer qu’une pomme est par exemple est rouge et lourd :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>Predicate<Apple>redAndHeavyApple = redApple.and(a->a.getWeight()> 150 );</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>Or()</b> : on peut aussi combiner deux lambdas pour exprimer deux choix diffèrent :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>Predicate<Apple>redAndHeavyOrGreen = redApple.and(a->a.getWeight()> 150 )
.or(a-> “green”.equals(a.getColor()) );
<span class="aff">/* on a crée un prédicat qui exprime les pommes qui sont rouge et lourd OU les pommes vert */</span>
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>•	Composition des Functions :</b></p>
<p>Finalement, on peut composer des lambdas représentée par l’interface Function.</p>
<p><b>andThen() :</b> cette méthodeapplique la premier fonction donnée puis applique la deuxième fonction et renvoie le résultat :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
Function<<span class="system">Integer</span>, <span class="system">Integer</span>>  f = x -> x + 1;
Function<<span class="system">Integer</span>, <span class="system">Integer</span>>  g = x -> x * 2;
Function<<span class="system">Integer</span>, <span class="system">Integer</span>>  h = f.andThen(g) <span class="aff">;//  similaire au  g( f(x) )</span> 
<span class="system">int</span> result = h.apply(1); 
<span class="aff">//le resultat est 4</span>
</pre>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<p><b>Compose() </b>: cette méthode est similaire à andThen(), la seule différence est que compose applique la deuxième fonction puis la premier et renvoie le résultat :</p>
<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>
<pre>
Function<<span class="system">Integer</span>, <span class="system">Integer</span>>  f = x -> x + 1;
Function<<span class="system">Integer</span>, <span class="system">Integer</span>>  g = x -> x * 2;
Function<<span class="system">Integer</span>, <span class="system">Integer</span>>  h= f.compose(g) ;<span class="aff">//  similaire au f( g(x) )</span> 
<span class="system">int</span> result = h.apply(1); 
<span class="aff">//le resultat est  3</span>
</pre>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:27.0pt'><span
lang=EN-US style='font-size:14.0pt;line-height:115%;color:black'>&nbsp;</span></p>


