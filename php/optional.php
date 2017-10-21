

<p><b><span style='font-size:26.0pt;line-height:
115%'>Classe : Optional</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="introduction"> </a>

<p name="introduction"><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Introduction</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p>Java 8 introduit une nouvelle classe appelée <b>Optional</b>( java.util.Optional<T>).</p>
<p>Optional est un conteneur objet qui est utilisé pour représenter une valeur qui peut être nulle, on utilisant différentes méthodes qui facilite la gestion des valeurs comme « disponible » ou « non disponible »au lieu de vérifier des valeurs NULL.</p>
<p>Par exemple : prenant les classes Person,Car et Insurance  comme un modèle :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre><span class="public">public class </span>Person {
<span class="public">private </span>Car car; 
<span class="public">public </span>Car getCar() { <span class="public">return </span>car; }
}

<span class="public">public class</span> Car {
<span class="public">private </span>Insurance insurance; 
<span class="public">public </span>Insurance getInsurance() { <span class="public">return </span>insurance; } 
} 

<span class="public">public class </span>Insurance {
	<span class="public">private </span><span class="system">String</span> name; 
<span class="public">public </span ><span class="system">String </span>getName() { <span class="public">return </span>name; } 
}
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Si vous connaissez une personne peut ou non avoir une voiture, la variable ‘car’ à l’intérieur de la classe ne doit pas êtredéclarée de type voiture (et affecté à une référencenulle lorsque la personne ne possède pas une voiture) mais doit plutôt être de type Optional<car> :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>
<span class="public">public class </span>Person {
<span class="public">private</span> Optional<Car> car; 
<span class="public">public</span> Optional<Car> getCar() { <span class="public">return </span>car; }
}<span class="aff">//une personne peut ou non avoir une voiture</span>

<span class="public">public class </span>Car {
<span class="public">private</span> Optional<Insurance>insurance; 
<span class="public">public </span>Optional<Insurance>getInsurance() { <span class="public">return </span>insurance; } 
} <span class="aff">//une voiture peut ou non avoir une assurance</span>

<span class="public">public class </span>Insurance {
<span class="public">	private </span> <span class="system">String </span>name; 
<span class="public">public </span> <span class="system">String </span>getName() { <span class="public">return </span>name; } 

}<span class="aff">//mais une compagnie d’assurance doit avoir un nom.</span> 
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Remarque que utilisation du classe Optional a amélioré ce modèle. Le fait qu’un personne fait référence à uneOptional<Car> nous donne une idée à la disponibilité d’objet ‘Car’.</p>
<p>De la même façon, le fait que le nom de la compagnie est déclaré de type String rend évident que c’est obligatoire pour une instance compagnie d’avoir un nom.</p>
<p>Ainsi, nous pouvons prédire et éviter les exceptions ;vous ne devez pas ajouter un test de nulle pour le nom d’compagnie parce que ça sert à cacher le problème au lieu de le fixer. Une compagnie doit avoir un nom, donc si vous trouvez un sans nom, c’est-à-dire qu’il y a un problème dans les données et pas dans le code.</p>
<p>Il est important de noter que l’intention de la classe Optional est de vous aider à créer des APIs plus compréhensibles pour les utilisateurs et n’est pas de remplacer toutes les références nulles.</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<a name="methode"></a>
<p> <b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Les méthodes de classe Optional</span></b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>La première étape avant de travailler avec Optional  est d’apprendre comment créer des objets Optional, il y a plusieurs façons :</p> 
<p><b>•	Static <T> Optional <T>empty() </b>:  Empty Optional 
On peut utiliser la méthode statique Optional.empty() pour un objet Optional vide.
	<pre>Optional<Car>optCar = Optional.empty();</pre>
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	Static<T>Optional<T>of(T value) </b>: Optional d’une une valeur non nulle
On peut aussi créer un Optional d’après une valeur non nulle avec la méthode statique Optional.of() :
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre> Optional<Car>optCar = Optional.of(car);</pre>
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	Static<T>Optional<T>ofNullable(T value) </b>:Optional d’une valeur nulle </p>
<p>
Finalement, avec la méthode statique Optional.ofNullable(), on peut créer un Optional qui peut possède une valeur nulle :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
	<pre>Optional<Car>optCar = Optional.ofNullable(car) ;</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Si ‘car’ est nulle, ‘optCar’ sera un objet Optional vide.</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>Pour lire les valeurs retournées par des objets Optional on utilise les méthodes suivant :</b></p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	Get() </b>: si la valeur est présente il la renvoie, sinon il jette l’exception NoSuchElementException. Et cela pose le même problème que nous avions avant l’utilisation de classe Optional.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	T orElse(T other) </b>: cette méthode permet de donner une valeur par default si l’objet Optional ne contient pas une valeur.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	T orElseGet(Supplier<&#63; extends T>other) </b>:retourne la valeur si présent, sinon retourne la valeur ‘other’ donné par les paramètres.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	<&#63; extends throwable> T orElseThrow(Supplier<&#63; extends X>exceptionSupplier)</b>:retourne le contenu si il est présent, sinon lance l’exception crée par le ‘Supplier’ donné dans les paramètres.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	VoidifPresent(Consumer<&#63; super T>consumer)</b>: Si la valeur est présent,invoque le ‘Consumer’ spécifié avec la valeur, sinon ne fait rien.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	BooleanisPresent() </b>: renvoie <b>true</b> si la valeur est présente, sinon <b>false</b>.
</p>


<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p><b>Extraction et transformation des valeurs les objets Optional </b>:</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Pour les exemples qu’on va voir on utilise le modèle présenté au début du chapitre.
</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
<b>•	<E>Optional<E>map(Function<&#63; super T, &#63; extends E>mapper) </b>:</p><p>
Normalement, si on veut extraire le nom de la compagnie par exemple, en utilise un code comme :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
	<pre><span class="system">String</span> name = <span class="aff">null</span>;
<span class="system">if</span>(insurance != <span class="aff">null</span>){ 
name = insurance.getName(); }</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
la classe Optional donne une méthode <b>map</b>, similaire à la méthode de Stream qu’on a vu, cette méthode applique la fonction passé on argument au contenu de l’objet Optional, si l’objet est vide, rien ne se passe. 
</p><p>
Appliquant la méthode map dans l’exemple précédant :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>
Optional<String> name = insurance.map(Insurance::getName);</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>
Maintenant si on veut utiliser cette méthode pour écrire un code des méthodes chainées comme ceci :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre><span class="public"> public</span> <span class="system">String</span> getCarInsuranceName(Person person) { 
returnperson.getCar().getInsurance().getName(); 
		}</pre>
        <p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>La première idée que vous aurez est d’utiliser map :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>Optional<Person>optPerson = Optional.of(person);
                               Optional<String> name =optPerson.map(Person::getCar)
						.map(Car::getInsurance)
						.map(Insurance::getName);</pre>
       <p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>                 
<p>Mais ce code ne compile pas. Pourquoi ? la variable optPerson est de type Optional<Person>, alors c’est normal d’utiliser la méthode map. Mais getCar renvoie un objet Optional<car>, c’est-à-dire le résultat de la méthode map va renvoie un objet du type Optional<Optional<car>>. Par conséquent, l’appel de la méthode getInsurance est invalide parce que l’objet Optional le plus externe contient comme sa valeur un autre objet de type Optional,  qui ne supporte pas la méthode getInsurance.</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Pour résoudre ce problème, on utilise une autre méthode inspiré par les méthodes de streams : flatMap.</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p><b>•	<E>Optional<E>flatMap(Function<&#63; super T , Optional<E>>mapper) </b>:</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>La méthode flatMap prend une fonction comme argument et l’applique au contenu d’objet Optional, et renvoie un Optional, ce qui donne un Optional d’Optional.  Mais l’effet de flatMap  remplace chaque objet Optional par leur contenu, par conséquent, le résultat final sera un seul objet Optional.</p>
<p>Retournant au code précédant, on peut le modifier comme ceci :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>Optional<Person>optPerson = Optional.of(person);
Optional<String> name =optPerson.flatMap(Person::getCar)
						.flatMap(Car::getInsurance)
						.map(Insurance::getName)
                         .orElse(“Unknown”);</pre>
                         <p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>Note qu’on a utilisé la méthode orElse() pour renvoyer une valeur donner dans le cas où le résultat du map() est vide.</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>


<p><b>•	Optional<T>filter(Predicate<&#63; super T>predicate) </b>:</p>
<p>Normalement si on veut vérifier le nom de l’assurance par exemple, il faut passer par vérifier la présence du valeur et après tester l’égalité avec equals() :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>Insurance insurance = ...; 
<span class="system">if</span>(insurance != <span class="aff">null</span> && "CambridgeInsurance".equals(insurance.getName()))
{  <span class="system">System</span>.<span class="public">out</span>.println(<span class="aff">"ok"</span>);  }
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>On peut modifier cet exemple on utilisant la méthode filter() :</p>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<pre>optInsurance = optInsurance
.filter(insurance -> "CambridgeInsurance".equals(insurance.getName()));
</pre>
<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
<p>La méthode  filter() prend un prédicat comme un argument.si la valeur présente dans l’objet Optional correspond au prédicat, la méthodefilter renvoie la valeur ; sinon il renvoie un objet Optional vide.</p>
<p>Cette méthode est similaire à la méthode filter des streams. Si l’objet Optional est vide, la méthode n’a aucun effet, sinon elle applique le prédicat  à la valeur contenue dans l’Optional. Si cette application renvoie <b>true</b>, l’objet Optional est retourné sans changement, sinon la valeur est filtrée et l’objet Optional sera vide.</p>

<p class=MsoNormal><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

