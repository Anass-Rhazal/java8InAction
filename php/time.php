
<p><b><span style='font-size:24.0pt;line-height:115%;
font-family:"Arial","sans-serif"'>Date &amp; Time API</span></b></p>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>

<p><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Introduction</span></b></p>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>

<p>Avant java 8, les API de Date & Time étaient loin d’être idéale. Java 8 introduit une nouvelle Date & Time API pour tacler le problème.</p>
<p>Dans ce chapitre, on va explorer les fonctionnalités du Date & Time API.</p>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<a name="dates"></a>
<p><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Création des dates</span></b></p> 
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>la paquet  java.time inclus plusieurs classes pour les creation des dates : LocalDate,LocalTime , LocalDateTime, Instant, Duration, Period :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p><b>•	LocalDate</b></p>
<p>Une instance de cette classe est un objet qui représente une date sans information d’heures, et sans informations sur le fuseau horaire. Une instance de LocalDate a beaucoup des méthodes qui permettent de lire ces valeurs.</p>
<p>Par exemple pour créer un LocalDate et lire la valeur :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalDate</span> date = <span class="system">LocalDate</span>.of(<span class="public">2016</span> , <span class="public">4</span> , <span class="public">29</span>) ;<span class="aff">// 2016-4-29</span>
<span class="system">Int</span> year = date.getYear() ;<span class="aff">//2016</span>
<span class="system"  >Month</span> month = date.getMonth() ;<span class="aff">//APRIL</span>
<span class="system">Int </span>day= date.getDayOfMonth();<span class="aff">//29</span>
<span class="system">Day </span> OfWeekdow= date.getDayOfWeek();<span class="aff"> //FRIDAY</span>
<span class="system">Int</span>  len = date.legthOfMonth();<span class="aff">//30</span>
<span class="system">Boolean</span> leap= date.isLeapYear();<span class="aff">//false</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>On peut aussi obtenir la date courante à partir d’horloge de système avec la méthode <b>now()</b>:</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>LocalDate today = LocalDate.now();</pre>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p><b>•	LocalTime</b></p>
<p>Similairement, un moment de jour est représenté avec la classe LocalTime.</p>
<p>On peut créer des instances de LocalTime on utilisant la méthode <b>of()</b>, et    comme LocalDate, la classe LocalTime a des méthodes getter pour accéder ces valeurs :  </p>  
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalTime</span> time = <span class="system">LocalTime</span>.of(<span class="public">19</span> , <span class="public">30</span> , <span class="public">23</span>) ;<span class="aff">//19 :30 :23</span>
<span class="system">int</span> hour = time.getHour() ;<span class="aff">//19</span>
<span class="system">int</span> minute = time.getMinute() ;<span class="aff">//30</span>
<span class="system">int</span> second = time.getSecond() ;<span class="aff">//23</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>
on peut aussi créer des instances de LocalDate et LocalTime avec la méthode statique <b>parse()</b> qui prend un String comme argument :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalDate</span> date = <span class="system">LocalDate</span>.parse(<span class="aff">"2016-06-18"</span>); 
<span class="system">LocalTime</span> time = <span class="system">LocalTime</span>.parse(<span class="aff">"19:45:20"</span>);
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p><b>•	LocalDateTime</b></p>
<p>Pour créer une date avec les heures on utilise la classe LocalDateTime qui groupe les deux classes précédentes, sans le fuseau horaire.</p>
<p>On peut créer une instance de LocalDateTime directement ou avec une combinaison de LocalDate et LocalTime :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>  
<span class="aff">// 2016-04-18T13:45:20</span>
<span class="system">LocalDateTime</span> dt1 = <span class="system">LocalDateTime</span>.of(<span class="public">2016</span>, <span class="public">Month.APRIL</span>, <span class="public">18</span>, <span class="public">13</span>, <span class="public">45</span>, <span class="public">20</span>);
<span class="system">LocalDateTime</span> dt2 = <span class="system">LocalDateTime</span>.of(date, time);                                                  
<span class="system">LocalDateTime</span> dt3 = date.atTime(13, 45, 20);  				
 <span class="system">LocalDateTime</span> dt4 = date.atTime(time);    	<span class="aff">//c’est possible de passer une date au LocalTime ou le contraire.</span>
<span class="system">LocalDateTime</span> dt5 = time.atDate(date);
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>On peut aussi extraire un LocalDate ou LocalTime d’un LocalDateTime :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>LocalDate date = dt1.toLocalDate() ;
LocalTime time = dt1.toLocalTime() ;
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p><b>•	Instant</b></p>
<p>La classe java.time.instant présente un instant au cours de temps. Cette classe est utilisée uniquement par les machines. Elle se compose d’un certain nombre de secondes et de nanosecondes, par conséquence, elle ne peut pas manipuler des unités de temps compris par les humains. Par exemple :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">Instant</span> now = <span class="system">LocalDateTime</span>.now().toInstant();<span class="aff">// 2014-04-21T19:27:26</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>Toute les classes qu’on a vu implémente l’interface Temporal, permet de lire et manipuler des valeurs  d’un objet qui point a un moment. Maintenant on va voir comment créer une durée entre deux objets Temporal avec les classes Duration et Period.</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p><b>•	Duration</b></p>
<p>Cette classe permet de créer une durée entre deux LocalTime ou deux LocalDateTime, ou bien deux instants :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>      Duration d1 = Duration.between(time1, time2);  
        Duration d1 =Duration.between(dateTime1, dateTime2);             
        Duration d2 = Duration.between(instant1, instant2);
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>On ne peut pas avoir une durée entreLocalDateTime et Instant parce que les deux sont différentes. De plus, la classe Duration sert à créer une quantité de temps mesuré on seconde et nanosecondes, alors on peut pas avoir une durée entre localTime et LocalDate.</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p><b>
•	Period </b></p>
<p>Si on veut créer une quantité de temps mesuré par des années, mois, ou jours, on utilise la classe Period.
Pour trouver la difference entre deux LocalDates on utilise la methode <b>between()</b> :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>Period tenDays = Period.between(LocalDate.of(2014, 3, 8), 
LocalDate.of(2014, 3, 18));
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>On peut aussi créer des instances de Duration or Period directement à l’aide des methodes <b>of()</b>, <b>ofMinutes</b>, <b>ofDays</b>…etc.</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">Duration</span> threeMinutes = <span class="system">Duration</span>.ofMinutes(3);   <span class="aff">//3minutes</span>
<span class="system">Period</span> tenDays = <span class="system">Period</span>.ofDays(10);<span class="aff">//10 jours</span>
<span class="system">Period</span> threeWeeks = <span class="system">Period</span>.ofWeeks(3);<span class="aff">//3 semaines</span>
<span class="system">Period</span> twoYearsSixMonthsOneDay = <span class="system">Period</span>.of(<span class="public">2</span>, <span class="public">6</span>, <span class="public">1</span>); <span class="aff">// 2 année, 6 mois et 1 jour</span>

</pre>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>




<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<a name="manipulate"></a>
<p><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Manipulation des dates</span></b></p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>Il y a deux manières pour manipuler les attributs d’un LocalDate :</p>
<p> une manière absolue :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalDate</span> date1= <span class="system">LocalDate</span>.of(<span class="public">2016</span>,<span class="public">3</span>,<span class="public">23</span>) ;<span class="aff">//20160-3-23</span>
<span class="system">LocalDate</span> date2= date1.withYear(2017) ;
<span class="system">LocalDate</span> date3= date2.withDayOfMonth(21) ;
<span class="system">LocalDate</span> date4= date3.with (<span class="public">ChroField.MONTH_OF_YEAR</span>, <span class="public">7</span>) ;<span class="aff"> //2017-07-21</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>Ou une manière relative:</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalDate</span> date1= <span class="system">LocalDate</span>.of(<span class="public">2016</span>,<span class="public">3</span>,<span class="public">23</span>) ;<span class="aff">//2016-03-23</span>
<span class="system">LocalDate</span> date2= date1.plusWeeks(1) ;
<span class="system">LocalDate</span> date3= date2.minusYears(4) ;
<span class="system">LocalDate</span> date3= date2.minusplus(<span class="public">6</span>, <span class="public">chronoUnit.MONTHS</span>) ;<span class="aff">//2020-09-30</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>Toutes ces manipulations sont relativement simples. Parfois, on a besoin d’utiliser des opérations plus compliqués, comme changer une date au vendredi prochain, ou le dernier jour du mois…pour cela le Date & Time API a des méthodes prédéfinit « TemporalAdjusters » pour la plupart  des cas.
</p>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>


<p><b><i><span style='font-size:
16.0pt;line-height:115%'>Utilisation des TemporalAdjusters</span></i></b></p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>On peut accéder ces méthodes statiques par la classe TemporalAdjusters :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">Import static</span> <span class="public">java.time.temporal.TemporalAdjusters.*</span> ;
<span class="system">LocalDate</span> date1 = LocalDate.of(<span class="public">2016</span>,<span class="public">3</span>,<span class="public">14</span>) ;
<span class="system">LocalDate</span> date2 = date1.with(nextOrSame(DayOfWeek.SUNDAY) ) ;<span class="aff">// 2016-03-18</span>
<span class="system">LocalDate</span> date3 = day2.with(lastDayOfMonth() ) ;<span class="aff">//2016-03-31</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>
comme on a vu, les TemporalAdjusters nous permet d’utiliser des opérations plus compliqués pour manipuler les dates. On plus, on peut créer notre implémentation de TemporalAdjusters avec l’interface fonctionnelle TemporalAdjuster.
</p>


<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>

<p><b><span style='font-size:18.0pt;
line-height:115%'>l’interface fonctionnelle TemporalAdjuster</span></b></p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="aff">@FunctionalInterface</span>
<span class="public">public interface</span> TemporalAdjuster {
Temporal adjustInto(Temporal temporal);
                               }
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>L’implémentation de l’interface TemporalAdjuster peut définir comme on convertit un objet Temporal à un autre Temporal.</p>
<p>Par exemple on peut créer une classe PayDayAdjuster qui nous donne le jour de payement, supposant que ce jour se produit deux fois par mois : le 15 et le dernier jour du mois. Si le jour se trouve dans les weekends, le vendredi précédant est utilisé :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>
<span class="public">Public class</span> PayDayAdjuster <span class="public">implements</span> TemporalAdjuster{
<span class="public">public</span> Temporal adjustInto(Temporal input) {
<span class="system">LocalDate</span> date = <span class="system">LocalDate</span>.from(input);
<span class="system">int</span> day;
<span class="system">if</span> (date.getDayOfMonth() < 15) {
day = 15;
 } <span class="system">else</span> {
day = date.with(TemporalAdjusters.lastDayOfMonth()).getDayOfMonth();
}
date = date.withDayOfMonth(day);
<span class="system">if</span> (date.getDayOfWeek() == DayOfWeek.SATURDAY ||
date.getDayOfWeek() == DayOfWeek.SUNDAY) {
date = date.with(TemporalAdjusters.previous(DayOfWeek.FRIDAY));
 }

<span class="public">return</span> input.with(date);

}<span class="aff">/* la methodadjustIntoaccept une instance Temporal et renvoie un  LocalDate. */</span>
}
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>La méthode est invoqué de la même manière qu’un adjuster prédéfinis, on utilisant la méthode with() :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre>LocalDatenextPayday = date.with(new PaydayAdjuster());</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>

<p><b><span style='font-size:18.0pt;
line-height:115%'>Lire les valeurs des objets Date/Time</span></b></p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>Le nouveau paquet java.time.format nous permet de lire des valeurs Date/Time.</p>
<p>La classe la plus importante de ce paquet est DateTimeFormatter : cette classe offre des méthodes statiques et des constantes comme <b>BASIC_ISO_DATE</b> et  <b>ISO_LOCAL_DATE</b> qui permet de créer des Strings qui représente une date ou un temps donné dans une forme spécifique. Par exemple :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalDatedate</span> = <span class="system">LocalDate</span>.of(<span class="public">2016</span>,<span class="public">03</span>,<span class="public">24</span>);
<span class="system">String</span> s1= date.format(DateTimeFormatter.BASIC_ISO_DATE);<span class="aff">//20160324</span>
<span class="system">String</span> s1= date.format(DateTimeFormatter.ISO_LOCAL_DATE);<span class="aff">//2016-03-24</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>
On peut aussi extraire un objet LocalDate/LocalTime d’un String qui représente une date ou un temps avec la méthode <b>parse()</b> prévu par les classes Date/Time :</p>
<pre><span class="system">LocalDate</span> date=<span class="system">LocalDate</span>.parse(<span class="aff">”20160324”</span>, <span class="public">DateTimeFormatter.BASIC_ISO_DATE</span>);
<span class="system">LocalDate</span> date=<span class="system">LocalDate</span>.parse(<span class="aff">”2016-03-24”</span>   ,<span class="public"> DateTimeFormatter.ISO_LOCAL_DATE</span>);

</pre>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<a name="fuseau"></a>
<p><b><span style='font-size:18.0pt;line-height:115%;
font-family:"Arial","sans-serif";color:#365F91'>Les fuseaux horaires</span></b></p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>Aucune des classes qu’on a vues ne contient des informations sur les fuseaux horaires. La nouvelle classe java.time.ZoneId simplifie l’utilisation des fuseaux horaires, par exemple, on peut créer des objets ZoneId qui contient des règles d’horaire concernant une région :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">ZoneIdrome</span> Zone = <span class="system">ZoneId</span>.of(<span class="aff">"Europe/Rome"</span>) ; <span class="aff">//Les IDs des régions sont tous dans la forme «région/ville »</span>
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>
Apres la création d’un objet ZoneId, on peut le combiner avec un LocalDate, LocalDateTime ou une instance pour le transformer à une instance <b>ZonedDateTime</b>,qui présente un moment de temps relativement à un fuseau horaire spécifique :</p>

<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<pre><span class="system">LocalDate</span> date = <span class="system">LocalDate</span>.of(<span class="public">2014</span>, <span class="public">Month.MARCH</span>, <span class="public">18</span>);
<span class="system">ZonedDateTime</span> zdt1 = date.atStartOfDay(romeZone); 
<span class="system">LocalDateTime</span>  dateTime = <span class="system">LocalDateTime</span>.of(<span class="public">2014</span>, <span class="public">Month.MARCH</span>,<span class="public"> 18</span>, <span class="public">13</span>, <span class="public">45</span>); 
<span class="system">ZonedDateTime</span> zdt2 = dateTime.atZone(romeZone);
<span class="system">Instant</span> instant = <span class="system">Instant</span>.now();
 <span class="system">ZonedDateTime</span> zdt3 = instant.atZone(romeZone);
</pre>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
<p>La figure suivante explique la structure des objets ZonedDateTime et la relation avec les autres classes LocalDate/LocalTime et ZoneId :</p>
<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
 	
<div class="img"><img src="img/figure1.png"  /></div>


<p  style='margin-right:-27.0pt'><b><span lang=EN-US
style='font-size:20.0pt;line-height:115%;font-family:"Georgia","serif";
color:#0070C0'>&nbsp;</span></b></p>
