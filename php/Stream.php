

<p><b><span style='font-size:26.0pt;line-height:
115%'>Streams</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="introduction"> </a> 
<p ><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Introduction</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>Les Streams sont une nouvelle couche abstraite introduite dans Java 8,  qui nous permet de traiter des collections desdonnées d’une manière similaire aux requêtes SQL.</p>
<p>Avant Java 8, on a utilisé des boucles et des contrôles répétés pour tester et filtrer par exemple. Pour résoudre le problème, Java 8 a introduit un concept qui permet de traiter des donnés d’une manière déclarative et plus simple :</p>
<p>Par exemple, si on veut sélectionner les employés avec un salaire >4000 :</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>Java7 </b></p>
<pre>
List< Emp> e=new ArrayList< >() ;
for(Emp p :LesEmp)
 {     if(p.getSalary()<4000)  
e.add(p);
}
Collections.sort(e,new Comparator< Emp >(){
public  int compare(Emp e1,Emp e2) { 
returnDouble.compare(e1.getSalary(),e2.getSalary());
}});
List<String>lesNomEmp=new ArrayList<>();
for(Emp  p:e)
lesNomEmp.add(p.getName());

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Dans cet exemple, on a créé un variable e qu’on va utiliser une seule fois. Avec Java 8, cette implémentation n’est plus utilisée :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>Avec java 8</b></p>
<pre>
List<String>lesNomEmp=LesEmp.stream()
            .filter(d ->d.getSalary()<4000)
           .sorted(comparing(Emp::getSalary))
             .map(Emp::getName)
            .collect(toList());

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p name="introduction"><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Qu’est-ce qu’un Stream ?</span></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
Un Stream représente un flux d’objets provenant d’une source, et qui supportedes opérations de traitement de données.</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Voici les caractéristiques des Streams :</p>

 

<p>
<b>• Un courant d’objets : </b>:un Stream fournit un ensemble d’éléments de type spécifique d’une manière séquentielle. Le courant traite les éléments sur demande, et ne stocke jamais comme les collections.
</p>

<p>
<b>• 	Source : </b>:les Streams prend les Collections, Arrays, ou les ressources I/O comme une source d’entrée.
</p>

<p>
<b>•	Operations de traitement de données : </b>  les Streams offre des opérations similaire aux opérations utilisés en base des données (SQL par exemple) pour manipuler et traiter les données comme filter, map, reduce… 
</p>

<p>
<b>•	Pipelining : </b>   Les opérations renvoie un Stream, permettant à enchainer et former des flux plus grands.
</p>


<p>
<b> •	Itérations automatique ou interne : </b> avec les Streams, on fait des itérationsinternes sur les éléments fournis, contrairement aux collections où l’itération explicite est nécessaire.
</p>	

<p>Prenant l’exemple précédant pour expliquer ces idées : </p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<pre>

List<String>lesNomEmp=LesEmp.stream()
 //génère un stream d’après  ‘LesEmp’
                                        .filter(d ->d.getSalary()<4000)
//création d’un “pipeline”,commençant par filtrer les gens avec des salaires <4000  
                                         .sorted(comparing(Emp::getSalary))
//tri par salaire
                                           .map(Emp::getName)
 //prend les noms des éléme
                                             .collect(toList());
  //stocker le résultat dans une autre liste.



</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="StreamsVSCollections" ></a>
<p ><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Streams  vs. Collections </span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
La différence entre les Collections et les Streams réside dans la façon de traitement des données. Une collection est une structure de données en mémoire qui contient toutes les valeurs. Chaque élément de la collection doit être traité avant qu’il puisse être ajouté à la collection, on peut ajouter et retirer des éléments, mais chaque moment dans le temps, les éléments sont stockés dans la mémoire.
</p>
<p>
En revanche, un Stream est un flux de données fixe (on ne peut pas ajouter ou supprimer des éléments) dont les éléments sont calculés sur la demande.
</p>
<p>
L’idée est que l’utilisateur extrait uniquement les valeurs dont il a besoin d’un Stream, et ces éléments sont produits invisiblement pour l’utilisateur et lorsque c’est nécessaire.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>Traversable une seule fois</b></p>
<p>
Un Stream est traversable une seule fois. Après le Stream est consommé, on peut obtenir un nouveau Stream à partir de la source de données initiale, sinon, si on essaie d’appliquer une opération pour la deuxième fois, le code lance une exception. Par example:
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>
List< String> title = Arrays.asList(«java8», « on », « action ») ;
Stream< String> s = title.stream();
s.forEach(System.out::println);
s.forEach(System.out::println);// java.lang.IllegalStateException

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>Itération externe vs. Itération interne</b></p>
<p>Une autre différence entre les Collections et les Streams est la façon de gestion des itérations.</p>
<p>L’utilisation des Collections exige l’itération faite par l’utilisateur (par exemple on utilisant foreach), ceci est appelé itération externe. Contrairement, la Streams API utilise l’itération interne, c’est-à-dire elle fait les itérations automatiquement et stocke les résultats quelque part. On donne seulement une fonction pour décrire ce qu’il faut faire.</p>
<p>Voici un exemple d’une itération externe :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>
List< String> names = new ArrayList<>();
for(Dish d : menu){  //itération du menu 
	names.add(d.getName());  //extraction de nom et l’ajouter au liste.
}

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>




<p>Avec les Streams, on peut simplement faire comme ceci :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>
List<String> names = menu.stream()  
        .map(Dish::getName)          //donne la méthode dans les paramètres de map() pour extraire les noms.
        .collect(toList());//collection des données…Sans itération !


</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<p>
On utilisant les itérations internes, le traitement des objets peut être effectué de manière transparente en parallèle ou dans un ordre diffèrent qui peut être plus optimisé. Ces optimisations sont difficiles si on utilise les itérations externes comme on est habitué à faire, et c’est ça la raison pour laquelle les itérations internes sont préférables.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p name="introduction"><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Les opérations des Streams</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>L’interface java.util.stream.Stream définit plusieurs opérations, ils peuvent être classés en deux catégories :</p>
<p>• Des opérations intermédiaires : comme filter(), map(), limit()…</p>
<p>• Des opérations terminales : comme collect().</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>Les opérations intermédiaires </b></p>
<p>
Les opérations intermédiaires comme filter ou map renvoient un autre stream comme type de retour. Cela permet de connecter les opérations.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>Les opérations terminales </b></p>
<p>Les opérations terminales permettent de produire un résultat de n’importe quel type qui n’est pas un Stream (Int, List, void…etc), par réunir tous les éléments en utilisant un Collector.</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p name="introduction"><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Les opérations en détail</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Les Streamspermettent de passer des itérations externes à des itérations internes. Au lieu d’écrire un code ou on a besoin de gérer les itérations, on peut utiliser les streams API qui supporte les opérations de filtrage, et qui gère les itérations sur les collections pour vous.</p>
<p>Cette façon de travailler avec les données est très utile parce qu’on laisse la gestion des données pour les Streams API. Par conséquence, l’API peut travailler sur plusieurs optimisations en coulisses, et peut aussi décider d’exécuter le code en parallèle. </p>
<p>Pour cela l’API Streams utilise des méthodesqui permet de faire des opérations comme :</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<a name="Filtrage"></a>

<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Filtrage</span></i></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On peut sélectionner des éléments d’un Stream on utilisant la méthode filter() qui prend un prédicat comme argument et renvoie un Stream qui contient les éléments qui correspondent au prédicat :
</p>

<pre>
List<String>vegetarianMenu = menu.stream()  
.filter(Dish::isVegetarian)              //la référence de méthode vérifie si un plat est végétarien 
   .collect(toList());                                                       

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Pour filtrer les éléments unique on utilise la méthode distinct() qui renvoie un Stream avec les éléments unique seulement :</p>

<pre>
List<Integer> numbers = Arrays.asList(1, 2, 1, 3, 3, 2, 4);                      
  numbers.stream() 
.filter(i -> i % 2 == 0)
.distinct()
.forEach(System.out::println);
//le resultat est 2 et 4 

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On peut aussi limiter ou bloquer les nombres d’éléments d’un Stream avec la méthode limit() qui prend la taille comme argument, par exemple si on veut les trois premiers plats avec des calories >300 :
</p>

<pre>
List<Dish> dishes = menu.stream()
.filter(d ->d.getCalories() > 300)
.limit(3)
.collect(toList());
//notez que la méthode  limit() fonctionne aussi sur les Streams non triés

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On peut aussi utiliser la méthode skip(N) pour retourner un Stream après rejeter les N premiers éléments. Si le Stream a moins d’éléments que N, un Stream vide est retourné : 
</p>
<pre>
List<Dish> dishes = menu.stream()
.filter(d ->d.getCalories() > 300)
.skip(2)
 .collect(toList());
//les méthodes limit() et skip() sont complémentaires

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="Mapping"></a>
<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Mapping</span></i></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>•	map()</b></p>
<p>
La méthode map() prend une fonction comme argument, la fonction est appliqué au éléments de Stream. 
</p>
<p>
Par exemple dans l’exemple suivant on passe une fonction qui extrait les noms des plats :

</p>
<pre>
List<String>dishNames = menu.stream()
.map(Dish::getName) 
.collect(toList());
/* la méthode getName renvoie un String, alors map va renvoyer un Stream de type Stream< String>. */
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Un autre exemple est de retourner une liste des caractères unique d’une liste des mots, si on prend la liste ["Hello", "World"]  en renvoie la liste ["H", "e", "l", "o", "W", "r", "d"].
</p>
<p>
on peut essayer avec une map suivi par la fonction distinct :

</p>
<pre>
words.stream() .map(word ->word.split(""))
.distinct() .collect(toList());
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
cela ne fonctionnera pas parce que la méthode map renvoie un String[] pour chaque mot du Stream, alors le Stream retourné par map est de type Stream< String[]>, mais on veut un Stream< String> qui représente un Stream des caractères.
</p>
<p>
On a besoin d’un Stream des caractères au lieu des tableaux. Pour résoudre ce problème on utilise la méthode Arrays.stream() qui prend un tableau et produit un Stream des caractères :

</p>
<pre>
words.stream() .map(word ->word.split(""))
.map(Arrays::stream)
.distinct() .collect(toList());

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Encore, cette solution ne fonctionnera pas ! C’est parce que maintenant la deuxième map va retourner une liste des Stream Stream< Stream< String>>.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	flatMap() </b></p>
<p>
Heureusement, l’API   Streams contient une méthode pour résoudre ce problème, flatMap() : cette méthode 
applique sa fonction au contenu du Stream et non pas le Stream lui-même.  C’est-à-dire flatMap remplace chaque élément d’un Stream avec un autre Stream et concatène après tous les Stream dans un seul Stream. On peut dire que la méthode permet de mettre à plat un Stream :
</p>
<pre>
words.stream() .map(word ->word.split(""))
                              .flatMap(Arrays::stream)
.distinct() .collect(toList());

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="Finding"></a>
<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Finding and matching</span></i></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>•	anyMatch()</b></p>

<p>
Une autre façon de traitement des données est de trouver si un des  éléments dans un ensemble de données correspondent à un prédicat donné. La méthode anyMatch() est une opération terminale qui retourne un booléen :
</p>
<pre>
if(menu.stream().anyMatch(Dish::isVegetarian)){
System.out.println("The menu is (somewhat) vegetarian friendly!!"); 
}

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	allMatch() </b></p>
<p>
Pour tester si un prédicat vérifie tous les éléments d’un Stream on utilise la méthode allMatch() : 
</p>
<pre>
booleanisHealthy = menu.stream() .allMatch(d ->d.getCalories() < 1000);
</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>•	nonMatch()  </b></p>
<p>
le contraire de allMatch() est…nonMatch() ! Elle vérifie si aucun élément du Stream ne correspond au prédicat donné. Par exemple, on peut refaire l’exemple précédant comme ceci :
</p>
<pre>
booleanisHealthy = menu.stream() .noneMatch(d ->d.getCalories() >= 1000);
</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	findAny()  </b></p>
<p>
La méthode findAny()sert à retourner un élément arbitraire de typeOptional (voir le chapitre du classe Optional) .Par exemple :
</p>
<pre>
Optional<Dish> dish =menu.stream() .filter(Dish::isVegetarian) .findAny();
</pre>

<p>La méthode va optimiser le Stream en terminant des que le résultat est trouvé.</p>


<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	findFirst() </b></p>
<p>
Une autre méthode est findFirst()qui sert à retourner le premier élément rencontré. Par exemple, dans l’exemple suivant on donne une liste des nombres pour trouver le premier carrée divisée par 3 :
</p>
<pre>
List<Integer>someNumbers = Arrays.asList(1, 2, 3, 4, 5); 
Optional<Integer>firstSquareDivisibleByThree =
someNumbers.stream()
.map(x -> x * x)
.filter(x -> x % 3 == 0) .findFirst(); // 9

</pre>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="Reducing"></a>
<p class=MsoListParagraph style='text-indent:-18.0pt'><span style='font-size:
18.0pt;line-height:115%;font-family:Wingdings;color:#943634'>§<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span><span dir=LTR></span><b><i><span
style='font-size:18.0pt;line-height:115%;color:#943634'>Reducing</span></i></b></p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>
On peut combiner les éléments d’un Stream pour exprimer des requêtes plus compliqué comme « le calcul du somme des calories dans un menu » on utilisant l’opération reduce(). Cetterequêtecombine tous les éléments du Stream pour produire une seule valeur Int.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
La méthode reduce() est une opération terminale qui réduit les éléments du Stream avec un BinaryOperator.
</p>
<p>
Par exemple, si on veut la somme des nombres d’une liste :
</p>
<pre>
int sum = numbers.stream().reduce(0, (a, b) -> a + b);
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Il y a deux paramètres dans ce code :</p>
<p>•	une valeur initiale : 0</p>
<p>•	un BinaryOperator<T>pour combiner deux éléments et produire une nouvelle valeur. Ici on utilise une expression Lambda.</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On peut facilement modifier ce code pour appliquer une multiplication pour tous les éléments du Stream on utilisant l’expression Lambda (a, b) -> a * b :
</p>
<pre>
int product = numbers.stream().reduce(1, (a, b) -> a * b);
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On a aussi l’option d’utiliser une variante de reduce qui ne prend pas une valeur initiale, mais elle renvoie un objet Optional :
</p>
<pre>
Optional< Integer> sum = numbers.stream().reduce((a, b) -> (a + b));
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Mais pourquoi renvoyer un Optional< Integer> ? Si on considèrele cas quand le Stream ne contient pas des éléments. La méthode reduce ne peut pas retourner une somme parce qu’il ne dispose pas d’une valeur initiale. Ceci est la raison pour laquelle le résultat est retourné dans un objet Optional pour indique que la somme peut être absent.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
L’opération reduce nous permet aussi de trouver le max/min d’un stream ! On a besoin d’une expression Lambda qui prend deux éléments et renvoie le maximum/minimum. La méthode reduce va utiliser la nouvelle valeur avec la va valeur prochaine jusqu’à tous les éléments sont consommés :
</p>
<pre>
Optional< Integer> max = numbers.stream().reduce(Integer::max);
Optional< Integer> max = numbers.stream().reduce(Integer::min);//pour le min

</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
On peut utiliser une expression lambda (x,y)->x< y?x:yau lieu de référence Integer::min, mais le dernier est plus facile à lire.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


