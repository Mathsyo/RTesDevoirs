<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{

    public function randomHexPastelColor() 
    {
        $r = dechex(rand(128, 255));
        $g = dechex(rand(128, 255));
        $b = dechex(rand(128, 255));
        return "#$r$g$b";
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'code' => 'R101',
                'name' => 'Initiation aux Réseaux Informatiques',
                'acronym' => 'InitRes',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R102',
                'name' => 'Principes et Architecture des Réseaux',
                'acronym' => 'ArchiRes',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R103',
                'name' => 'Réseaux Locaux et Equipements Actifs',
                'acronym' => 'LAN',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R104',
                'name' => 'Fondamentaux des systèmes éléctroniques',
                'acronym' => 'Eln',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R105',
                'name' => 'Supports de transmissions pour les réseaux locaux',
                'acronym' => 'Lignes',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R106',
                'name' => 'Architecture des systèmes numériques et informatique',
                'acronym' => 'ArchiInfo',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R107',
                'name' => 'Fondamentaux de la programmaton',
                'acronym' => 'Python',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R108',
                'name' => 'Bases des systèmes d’exploitation',
                'acronym' => 'Shell',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R109',
                'name' => ' Introduction aux technologies Web',
                'acronym' => 'Web',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R110',
                'name' => 'Anglais de communication et initiation au vocabulaire technique',
                'acronym' => 'Anglais',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R111',
                'name' => 'Expression-Culture-Communication Professionnelles',
                'acronym' => 'ExprCom',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R112',
                'name' => 'Projet Personnel et Professionnel',
                'acronym' => 'PPP',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R113',
                'name' => 'Mathématiques du signal',
                'acronym' => 'MathSignal',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R114',
                'name' => 'Mathématiques des transmissions',
                'acronym' => 'MathTx',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'R115',
                'name' => 'Gestion de projet',
                'acronym' => 'GestProj',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'SAE101',
                'name' => 'Se Sensibiliser à l’Hygiène Informatique et à la cybersécurité',
                'acronym' => 'SecNum',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'SAE102',
                'name' => 'S’initier aux réseaux informatiques',
                'acronym' => 'PacketTracer',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'SAE103',
                'name' => 'Découvrir un dispositif de transmission',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'SAE104',
                'name' => 'Se présenter sur Internet',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'SAE105',
                'name' => 'Traitement de données',
                'color' => $this->randomHexPastelColor(),
            ],
            [
                'code' => 'SAE106',
                'name' => 'Portfolio',
                'color' => $this->randomHexPastelColor(),
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
