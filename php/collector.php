
<p><b><span style='font-size:26.0pt;line-height:
115%'>Collection des données avec les streams</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>Les Collectors sont utilisés comme un paramètre de la méthode collectpour combiner le résultat de la transformation sur les éléments d’un Stream. Le Collector applique une fonction qui transforme les élémentsde Stream, et accumule le résultat dans une structure de données qui contient le résultat final de ce processus. Par exemple :</p>
<pre>
List< Transaction> transactions = transactionStream.collect(Collectors.toList());
</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<p>
Les Collectors utilisent des méthodes statiques pour effectuer des fonctionnalités comme réduire, regrouper, ou partitionner les éléments…etc.
</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<a name="reduire"></a>

<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Réduire</span></i></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>



<p>
On peut utiliser les Collectors pour combiner tous les éléments d’un Stream dans un seul résultat.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	Maximum & Minimum :</b></p>
<p>
Supposant on veut trouver le plat avec la valeur maximum des calories, on peut utiliser deux Collectors : Collectors.maxBy  et Collectors.minBy, pour calculer le maximum ou le minimum des valeurs d’un Stream. Ces collectors prennent un Comparator comme argument pour comparer les éléments de Stream :
</p>
<pre>
Comparator< Dish>dishCaloriesComparator =
Comparator.comparingInt(Dish::getCalories);

Optional< Dish>mostCalorieDish =
menu.stream().collect(maxBy(dishCaloriesComparator));


</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On a utilisé le type Optional<Dish>parce qu’on a considéré le cas où le menu est vide. Avec la classe Optional,  on peut représenter l’idée qu’on peut avoir aucun élément dans le Stream.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	Somme et Moyenne :</b></p>

<p>
On peut utiliser la méthode statique Collectors.summingIntqui prend une fonction qui transforme un élément à un objet int, puis renvoie un Collector qui effectue l’addition après être passé au méthode collect() :
</p>

<pre>
inttotalCalories = menu.stream().collect(summingInt(Dish::getCalories));

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<p>
Les méthodes Collectors.summingLonget Collectors.summingDoublefont la même chose pour l’addition des valeurs Long ou Double.
Pour la moyenne on utilise la méthode Collectors.averaginInt, Collectors.averaginLonget Collectors.averaginDouble :

</p>
<pre>
doubleavgCalories =
menu.stream().collect(averagingInt(Dish::getCalories));


</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
Il y a aussi une méthode qui peut retourner tous ces résultats avec une seule opération : Collectors.summarizingInt.

</p>
<p>
Par exemple, on peut calculer le nombre des plat, obtenir le somme, la moyenne, le maximum et la minimum des calories de chaque plat avec une seul opération :

</p>

<pre>
IntSummaryStatisticsmenuStatistics =
menu.stream().collect(summarizingInt(Dish::getCalories));

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
Ce collector regroupe toutes ces informations dans une classe IntSummaryStatisticsqui utilise des méthodes getter pour accéder les résultats.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	Joindre les Strings :</b></p>

<p>
La méthode Collectors.joining() invoque la méthode toString de chaque élément et retourne une concaténation des éléments du Stream.
</p>

<pre>
String shortMenu = menu.stream().collect(joining());
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Le variable ShortMenu contient le String:
</p>
<p><b>
porkbeefchickenfrenchfriesriceseasonfruitpizzaprawnssalmon,
</b></p>

<p>
qui est pas très lisible, heureusement, la méthode joining a une version qui accepte une chaine de caractères entre deux éléments consécutives, par exemple :
</p>

<pre>
String shortMenu = menu.stream().map(Dish::getName).collect(joining(", "));
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Maintenant le variable ShortMenu contient le String: 
</p>

<p><b>
pork, beef, chicken, french fries, rice, season fruit, pizza, prawns, salmon.
</b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	La méthode reducing() :</b></p>

<p>
Toutes les méthodes qu’on a vues sont des cas spécifiques du processus de réduction qui utilise la méthode statique collectors.reducing(). Par exemple on peut calculer le total des calories dans un menu avec un collector créé par reducing :
</p>

<pre>
int totalCalories = menu.stream()
                     .collect(reducing(0, Dish::getCalories, (i, j) -> i + j));

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>La méthode reducing prend 3 arguments :</p>
<p>•	La valeur initiale et la valeur retournée si le Stream est vide.</p>
<p>•	La méthode qui transforme les éléments en un entier.</p>
<p>•	Une méthode qui retourne la somme de deux valeurs.</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<p> Similairement, on peut utiliser une méthode reducing() qui prend un seul argument : </p>
<pre>
Optional<Dish>mostCalorieDish =
	menu.stream()
.collect(reducing((d1, d2) -> d1.getCalories()> d2.getCalories() ? d1 : d2));
</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<a name="regrouper"></a>

<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Regrouper</span></i></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>



<p>On peut utiliser la méthode statiqueCollectors.groupingBy pour regrouper des éléments dans des groupes, basés sur un ou plusieurs attributs. </p>
<pre>
Map< Dish.Type, List< Dish>>dishesByType =
menu.stream().collect(groupingBy(Dish::getType));
</pre>	
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>Le résultat va être : </p>
<p><b>
{FISH=[prawns, salmon], OTHER=[french fries, rice, season fruit, pizza],
MEAT=[pork, beef, chicken]}
</b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Si on veut regrouper les éléments par des conditions plus compliqués au lieu d’un attribut simple, par exemple des groupes qui dépend au nombre des calories, on peut exprimer ce logique avec les expressions Lambda :
</p>
<pre>
public enum CaloricLevel { DIET, NORMAL, FAT }

Map< CaloricLevel, List< Dish>> dishesByCaloricLevel = menu.stream().collect(
groupingBy(dish -> {
if (dish.getCalories() <= 400) return CaloricLevel.DIET;
else if (dish.getCalories() <= 700) 
returnCaloricLevel.NORMAL;
else return CaloricLevel.FAT;
} ));

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
On peut aussi utiliser les deux façons pour regrouper les éléments du Stream avec une version de la méthode groupingBy qui prend un deuxième argument de type Collector. Alors pour effectuer un regroupement de deux niveaux, on passe une groupingBy interne au groupingBy externe :
</p>
<pre>
Map< Dish.Type, Map< CaloricLevel, List< Dish>>>dishesByTypeCaloricLevel = menu.stream().collect(
groupingBy(dish::getType ,
groupingBy(dish -> {
if (dish.getCalories() <= 400) return CaloricLevel.DIET;
else if (dish.getCalories() <= 700) 
returnCaloricLevel.NORMAL;
else return CaloricLevel.FAT;
} ));

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Le résultat de ce regroupement est :
</p>
<p><b>
{MEAT={DIET=[chicken], NORMAL=[beef], FAT=[pork]},
FISH={DIET=[prawns], NORMAL=[salmon]},
OTHER={DIET=[rice, seasonal fruit], NORMAL=[french fries, pizza]}}

</b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Cette opération du multi-niveau regroupement peut être prolongée au plusieurs niveaux, et un n-niveau regroupement a un résultat de n-niveau Map qui contient n-niveau des structures.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Le deuxième argument de la méthode groupingBy accepte n’importe quelle Collector, et pas juste un autre groupingBy, par exemple, on peut compter le nombre des plat de chaque type dans le menu, on passant counting comme and deuxième argument de collector groupingBy :
</p>

<pre>
Map< Dish.Type, Long>typesCount = menu.stream().collect(
groupingBy(Dish::getType, counting()));

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Le résultat de cette opération :</p>
<p><b>{MEAT=3, FISH=2, OTHER=4}</b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><span style='font-size:14.0pt;line-height:115%;color:red'>Remarque : la méthodegroupingBy(f) ou f est la fonction de classification, est en réalité une manière raccourcie d’écriregroupingBy(f,toList()).</span></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<a name="partitionner"></a>

<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Partitionner</span></i></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<p>
Le partitionnement est un cas spécial de regroupement, on utilisant un prédicat comme une fonction de classification qui retourne un booléen, c’est-à-dire le résultat va être une Map qui contient un booléen comme clé, donc on va avoir au maximum deux groupes : une pour true et l’autre pour false.
</p>

<pre>
Map<Boolean, List<Dish>>partitionedMenu =
menu.stream().collect(partitioningBy(Dish::isVegetarian));

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>Le résultat est :</p>

<p><b>{false=[pork, beef, chicken, prawns, salmon],
true=[french fries, rice, season fruit, pizza]}</b></p>

<p>Après si on veut accéder ces valeurs on indique la clé dans la méthode get du Map : </p>

<pre>
List<Dish>vegetarianDishes = partitionedMenu.get(true);
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
On peut avoir le même résultat si on utilise la méthode filter :
</p>

<pre>
List<Dish>vegetarianDishes =
menu.stream().filter(Dish::isVegetarian).collect(toList());
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Mais c’est préféré d’utiliser la méthode de partitionnement parce que çadonne l’avantage de garder les deux listes des éléments de Stream.
</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
On peut aussi passer un deuxième argument de type Collector, par exemple :

</p>

<pre>
Map< Boolean, Map< Dish.Type, List< Dish>>> vegetarianDishesByType=
menu.stream().collect(
partitioningBy(Dish::isVegetarian,
groupingBy(Dish::getType)));
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
Cette opération va générer une map de deux niveaux :
</p>
<p><b>
{false={FISH=[prawns, salmon], MEAT=[pork, beef, chicken]},
true={OTHER=[french fries, rice, season fruit, pizza]}}
</b></p>



<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<a name="interface collector"></a>

<p name="introduction"><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>L’interface Collector</span></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>



<p>
L’interface Collector se compose d’un ensemble de méthodes qui fournissentun plan pour savoircomment implémenter cette interface.</p>
<p>
Chaque méthode Collector  implémente les méthodes déclarées dans l’interface Collector :
</p>

<pre>
public interface Collector< T, A, R> {
Supplier< A>supplier();
BiConsumer< A, T> accumulator();
Function< A, R>finisher();
BinaryOperator< A>combiner();
Set< Characteristics>characteristics();
}
</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
Chaque Collector accepte les éléments de type T et produit des valeurs de type R (par exemple R = List< T>). Le type générique < A> définit le type intermédiaire qu’on va utiliser pour accumuler les éléments de type T :	
</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>La méthode supplier :</b></p>
<p>
Cette méthode retourne une fonction qui crée une instance d’un accumulateur qu’on va utiliser dans le processus de collection des éléments de type T.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>La méthode accumulator :</b></p>
<p>
Cette méthode retourne une fonction qui prend deux arguments et effectue une opération de réduction. Le premier argument est l’accumulateur et le deuxième est le nième élément traversé du Stream. 
La fonction retourne void parce que l’accumulateur est modifié dans la fonction.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>La méthode combiner :</b></p>
<p>
Cette méthode est utilisée  pour relier deux accumulateurs en un seul. On utilise le combiner si le Collector est exécuté en parallèle.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>La méthode finisher :</b></p>
<p>
Cette méthode prend l’accumulateur de type A et il se transforme en une valeur de résultat final de type R.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>La méthode characteristics :</b></p>
<p>
La méthode characteristics, retourne un ensemble des caractéristiques définissant le comportement du Collector.Characteristics est une énumération contenant trois éléments : 
</p>

<p>
<span style='font-size:14.0pt;line-height:115%;font-family:"Courier New"'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span dir=LTR></span><span style='font-size:14.0pt;line-height:115%'>UNORDERED&nbsp;:</span>
</p>

<p>
Le résultat de réduction n’est pas affecté par l’ordre dans lequel les éléments du Stream sont traversés et accumulés.
</p>

<p>
<span
style='font-size:14.0pt;line-height:115%;font-family:"Courier New"'>o<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span dir=LTR></span><span
style='font-size:14.0pt;line-height:115%'>CONCURRENT&nbsp;:</span>
</p>

<p>
La fonction de l’accumulateur peut être appelée simultanément à partir de plusieurs threads, et ce Collector peut effectuer une réduction en parallèle.
</p>
<p>
<span
style='font-size:14.0pt;line-height:115%;font-family:"Courier New"'>o<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span dir=LTR></span><span
style='font-size:14.0pt;line-height:115%'>IDENTITY_FINISH&nbsp;:</span>
</p>

<p>
Cela indique que la fonction retournée par la méthode finisher est la fonction d’identité. Dans ce cas l’objet accumulateur est utilisé comme un résultat final de la réduction.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>Exemple de ToListCollector :</b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On peut implémenter une classe ToListCollector< T>qui rassemble tous les éléments d’un Stream dans une Liste :
</p>

<pre>
Import java.util.* ;
Import java.util.function.* ;
Import java.util.stream.Collector ;
Import static java.util.stream.Collector.Characteristics.* ;

public class ToListCollector< T> implements Collector< T, List< T>, List< T>>{

	public Supplier< List< T>>supplier() {
returnArrayList::new;
}	
public BiConsumer< List< T>, T>accumulator() {
return List::add;
}	

public Function< List< T>, List< T>> finisher() {
returnFunction.identity();
}	

public BinaryOperator< List< T>> combiner() {
return (list1, list2) -> {
list1.addAll(list2);
return list1; }
}	

publicSet< Characteristics> characteristics() {
	returnCollections.unmodifiableSet(
EnumSet.of(IDENTITY_FINISH, CONCURRENT));
}}

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
