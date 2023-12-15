<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignments')->insert([
            'title' => 'Je gaat werken met ontwikkelmethodes voor software, zoals scrum.',
            'description' => '
            A. Je gaat tijdens een project een volledig verslag maken van het scrum proces. Maak een productbacklog, verschillende sprint backlogs, per sprint een retrospectief en een reflectieverslag, taken overzichten, burn-down chart.

            B. Je gaat tijdens een project samenwerken met meerdere mensen. Daarbij let je op je eigen planning en of die planning realistisch is en haalbaar is. Vervolgens ga je tijdens het project de voortgang monitoren. Je gaat bijhouden of je planning lukt, en of de planning van anderen lukt. Je gaat samen met anderen evalueren wat tijdens het project goed gaat en wat beter kan. Dat ga je op verschillende momenten doen tijdens het project.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 1,
        ]);

        DB::table('assignments')->insert([
            'title' => 'Je gaat je applicatie met versiebeheer opslaan, waarbij git wordt gebruik.',
            'description' => '
            A. Je gaat tijdens een softwareproject waaraan je met meerdere studenten werkt een git repository beheren. Je gaat samen de main branch beheren, branches aanmaken, mergen, pull, push enzovoort. Je maakt een README voor de applicatie en je maakt in de projectwijzer verwijzingen naar de verschillende branches, in verschillende versies, waar je aan hebt gewerkt en die zijn opgenomen of niet in de main branche die naar git hub of git lab is gepusht.

            B. Je gaat tijdens een project samenwerken met meerdere mensen. Daarbij let je op je eigen planning en of die planning realistisch is en haalbaar is. Vervolgens ga je tijdens het project de voortgang monitoren. Je gaat bijhouden of je planning lukt, en of de planning van anderen lukt. Je gaat samen met anderen evalueren wat tijdens het project goed gaat en wat beter kan. Dat ga je op verschillende momenten doen tijdens het project.            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 1,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat applicaties ontwerpen volgens ontwerpprincipes zoals OOP (object oriented programming), ECS (entity component system) of functioneel programmeren. Je gaat de diagrammen lezen, interpreteren en maken die horen bij het ontwerpen van een applicatie.
            ',
            'description' => '
            A. Je gaat een applicatie ontwerpen op basis van een klantgesprek, waarbij je de applicatie zo gaat ontwerpen dat de documentatie aansluit bij een applicatie die is gebouwd met objecten of entiteiten. Je laat in het ontwerp zien hoe je hebt rekening gehouden met oop of ecs doordat je user story’s hebt beschreven, een erd hebt gemaakt, een klassendiagram hebt gemaakt

            B. Je maakt UML diagrammen die horen bij het ontwerpen van een applicatie. Je gaat user story’s omzetten in diagrammen en je gaat diagrammen ontwerpen die horen bij het opslaan van gegevens (normaliseren). Je maakt een use case diagram, een klassendiagram en een entiteit-relatie-diagram op basis van een probleemstelling met gegevensbestand.

            C. Je maakt een navigatiestructuur op basis van diagrammen die zijn opgeleverd als ontwerp van een applicatie

            D. Je maakt een wireframe op basis van diagrammen die zijn opgeleverd als ontwerp van een applicatie
            ',
            'status' => 'Gesloten',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 2,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je bestudeert de security tijdens het ontwerpen van applicaties Je onderzoekt de (relevante) wetgeving over privacy, copyright en auteursrechten en cyber criminaliteit en toepassen.
            ',
            'description' => '
            A. Je bent je bewust van de risico’s bij applicaties, ook al zijn de applicaties nog niet gebouwd. Je gaat bij het ontwerp van een applicatie (website, app, desktop) aangeven waar de risico’s zitten voor aanvallen. Je gaat aangeven in het ontwerp hoe daarmee rekening gehouden kan worden tijdens het latere bouwen van de applicatie. Je gaat uit van de risicoanalyse en de top tien van OWASP.

            B. Je gaat bij (web)applicaties kijken welke wetgeving van belang is wat betreft privacy, copyright en auteursrechten en cybercriminaliteit. Je gaat voor dataopslag bekijken hoe de wetgeving is geregeld. Je gaat voor een webshop uitzoeken welke wetgeving betrekking heeft op de rechtsbescherming van de klant. Je maakt een toets over wetgeving, rond privacy, copyright, auteursrechten, cybercriminaliteit en webshops
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 2,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je leert één of meer programmeertalen. Je gaat werken met een IDE. Je gaat ontwerpeisen toepassen in producten. Je gaat een gegevensverzameling omzetten, mysql, json-objecten, mongodb.
            ',
            'description' => '
            A. Leer een programmeertaal die je vanaf de basis programmeert. Je gebruikt de juiste syntax en je juiste semantiek. Je leert naast de taal, de universele onderdelen van programmeertalen, zodat je minder moeite hebt om een andere programmeertaal te leren.
            
            B. Je gaat gebruik maken van een IDE. Kies een IDE, installeer deze en bouw een eenvoudige webapplicatie met de IDE om de IDE-installatie te testen. Je gaat met een verslag beschrijven hoe je de IDE hebt geïnstalleerd, wat je nodig had om de IDE functioneel te maken, welke versie je hebt van de IDE, licenties, service, handleidingen
            
            C. Bij het programmeren van een applicatie maak je gebruik van Object georiënteerd programmeren, het MVC model en in het model maak je klassen voor alle objecten die je in de applicatie wilt gebruiken. Je scheidt het model van de views.
            
            D. Je krijgt een verzameling gegevens, of je legt zelf een verzameling gegevens aan. Je gaat deze geschikt maken voor gebruik in een applicatie. Daarvoor zul je de moeten omzetten in een formaat dat benaderd kan worden door een applicatie. Dan kan zijn een relationele database zoals Mysql of json-objecten of een file database zoals MongoDB Je gaat de nieuwe gegevensverzameling geschikt maken om benaderd te worden, om wijzigingen op door te voeren, om records uit te verwijderen
            
            E. Je gaat een ontwerp bestuderen en dat omzetten in een geschikt product. Daarbij houd je rekening met de klanteisen en het ontwerp dat voor de klant is gemaakt. Je kunt UML-diagrammen lezen en omzetten in geschikte code, security en infrastructuren
           ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 3,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat een ontwikkelplatform voor applicaties gebruiken. Je bestudeert de security tijdens het realiseren van applicaties. Je gaat informatie beveiligen.
            ',
            'description' => '
            Verdiep je in de ontwikkelplatforms die er zijn voor low code en no code. Kies een platform en maak een eenvoudige applicatie

            Je gaat bij applicaties kijken wat voor security is ingebouwd, zoals encryptie, https-protocol, tokens. Je maakt een risico analyse, je maakt een verslag hoe de applicatie is beschermd, hoe de applicatie kwetsbaar is en hoe je de webapplicatie veiliger kunt maken.
            
            Je gaat de informatie bekijken die in een webapplicatie wordt gebruikt en je gaat beoordelen hoe de data beschermd is en hoe de data kwetsbaar is. Je gaat de wetgeving controleren op basis van AVG en privacy.
            
            Je gaat een verslag maken hoe de data beschermd is en hoe dat beter kan en of de bescherming voldoet aan de wettelijke eisen.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 3,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat werken met testingtools en testtechnieken toepassen.
            ',
            'description' => '
            Je gaat leren werken met een testing tool. Je gaat een tool opzoeken en deze toepassen op een webapplicatie

            Je gaat code testen: Je gaat unit testen.

            Je gaat security testen: risico analyse.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 4,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat rekening houden met licenties en gebruiksrechten voor software.
            ',
            'description' => '
            Je gaat van een IDE onderzoeken welke licenties nodig zijn voor gebruik. En je gaat de gebruiksrechten bestuderen van een product waarvoor je een licentie aanschaft, zoals adobe of office.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 4,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je onderzoekt de toepassing van AI, machine learning en/of big data.
            ',
            'description' => '
            Je gaat één toepassing onderzoeken die gebruik maakt van AI, of je gaat een toepassing onderzoeken die gebruik maakt van machine learning of je gaat één toepassing onderzoeken die gebruik maakt van big data.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 5,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat onderzoeken welke ontwikkelingen op het vlak van ICT-infrastructuur en devices er zijn en welke consequenties deze op software development hebben.
            ',
            'description' => '
            Je gaat je verdiepen in microsoft Azure of AWT. Je activeert een webservice en je maakt een applicatie die gebruik gaat maken van die webservice.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 5,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat communiceren over werkzaamheden met studenten, colllega’s, projectleider.
            ',
            'description' => '
            Je gaat met een aantal studenten een opdracht analyseren en in overleg het werk verdelen in userstory’s.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 6,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat gesprekstechnieken toepassen in klantgesprek, gesprek tussen programmeur en ict-er.
            ',
            'description' => '
            Je gaat met de klant/ opdrachtgever overleggen wat de functionaliteiten zijn van de applicatie.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 6,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat een presentatie geven van een product.
            ',
            'description' => '
            Je leert professioneel communiceren met de klant over zijn wensen, jouw werkzaamheden, jouw afwegingen, je leert reflecteren, eventueel slecht nieuws onder woorden brengen, een reëel beeld scheppen over voortgang, resultaat, product.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 7,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je gaat een presentatie geven van een tool.
            ',
            'description' => '
            Je gaat een tool die handig is voor jouw beroep onderzoeken en presenteren, in een presentatie van minimaal 15 minuten plus demonstratie.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 7,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je reflecteert op het werk, per sprint, en maakt een verslag volgens de STARR methode.
            ',
            'description' => '
            Je gaat na een aantal weken beoordelen wat je hebt gedaan en je gaat dat vergelijken met wat je had moeten doen. Je gaat beoordelen hoe je je werk hebt gedaan en dat vergelijken met hoe je het had moeten doen.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 8,
        ]);

        DB::table('assignments')->insert([
            'title' => '
            Je reflecteert op het werk in een challenge.
            ',
            'description' => '
            Je doet mee aan een challenge en je reflecteert op jouw bijdrage gedurende de challenge en jouw aandeel in de uitkomst van de challenge.
            ',
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'author_id' => 4,
            'workprocess_id' => 8,
        ]);
    }
}
