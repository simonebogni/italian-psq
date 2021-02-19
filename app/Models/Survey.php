<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    public static $questionArrayInCouples = [
        [
            [
                "id"=>1,
                "question"=> "Mentre dorme, il tuo bambino russa più di metà della notte?",
                "radioName" => "sleep_snore_half"
            ],
            [
                "id"=>2,
                "question"=> "Mentre dorme, il tuo bambino russa sempre?",
                "radioName" => "sleep_snore_always"
            ]
        ],
        [
            [
                "id"=>3,
                "question"=> "Mentre dorme, il tuo bambino russa forte?",
                "radioName" => "sleep_snore_heavily"
            ],
            [
                "id"=>4,
                "question"=>"Mentre dorme, il tuo bambino ha un respiro pesante o rumoroso?",
                "radioName"=>"sleep_breath_loudly"
            ]
        ],
        [
            [
                "id"=>5,
                "question"=> "Mentre dorme, il tuo bambino ha un respiro difficoltoso o fatica a respirare?",
                "radioName" => "sleep_breath_difficulty"
            ],
            [
                "id"=>6,
                "question"=> "Hai mai visto il tuo bambino fare delle pause respiratorie durante la notte?",
                "radioName" => "sleep_breath_pause"
            ]
        ],
        [
            [
                "id"=>7,
                "question"=> "Il tuo bambino tende a respirare con la bocca aperta durante il giorno?",
                "radioName" => "breath_mouth_open"
            ],
            [
                "id"=>8,
                "question"=> "Il tuo bambino al mattino, quando si sveglia, ha la bocca secca?",
                "radioName" => "morning_dry_mouth"
            ]
        ],
        [
            [
                "id"=>9,
                "question"=> "Il tuo bambino occasionalmente bagna il letto?",
                "radioName" => "wet_bed"
            ],
            [
                "id"=>10,
                "question"=> "Il tuo bambino si sveglia poco riposato al mattino?",
                "radioName" => "wake_not_rested"
            ]
        ],
        [
            [
                "id"=>11,
                "question"=> "Il tuo bambino ha problemi di sonnolenza durante il giorno?",
                "radioName" => "day_drowsiness"
            ],
            [
                "id"=>12,
                "question"=> "Gli insegnanti hanno fatto notare che il tuo bambino appare assonnato durante il giorno?",
                "radioName" => "teacher_drowsiness"
            ]
        ],
        [
            [
                "id"=>13,
                "question"=> "E' difficile svegliare il tuo bambino al mattino?",
                "radioName" => "morning_wake_difficulty"
            ],
            [
                "id"=>14,
                "question"=> "Il tuo bambino si sveglia con il mal di testa al mattino?",
                "radioName" => "morning_headache"
            ]
        ],
        [
            [
                "id"=>15,
                "question"=> "Il tuo bambino ha smesso di crescere regolarmente in un certo periodo della vita?",
                "radioName" => "stopped_growing"
            ],
            [
                "id"=>16,
                "question"=> "Il tuo bambino è in sovrappeso?",
                "radioName" => "overweight"
            ]
        ],
        [
            [
                "id"=>17,
                "question"=> "Il tuo bambino spesso non sembra ascoltare quando gli si parla direttamente?",
                "radioName" => "not_listening"
            ],
            [
                "id"=>18,
                "question"=> "Il tuo bambino ha difficoltà ad organizzare compiti ed attività?",
                "radioName" => "organising_tasks_difficulty"
            ]
        ],
        [
            [
                "id"=>19,
                "question"=> "Il tuo bambino è facilmente distratto da stimoli esterni?",
                "radioName" => "easily_distracted"
            ],
            [
                "id"=>20,
                "question"=> "Il tuo bambino si agita con le mani o con i piedi o appare irrequieto quando sta seduto?",
                "radioName" => "agitate_when_sit"
            ]
        ],
        [
            [
                "id"=>21,
                "question"=> "Il tuo bambino è sempre in movimento o agisce come se fosse ipercinetico?",
                "radioName" => "hyperkinetic"
            ],
            [
                "id"=>22,
                "question"=> "Il tuo bambino interrompe o si intromette fra gli altri (si inserisce dentro conversazioni o giochi)?",
                "radioName" => "interrupts_others"
            ]
        ]
    ];

    private $questionArray = [
        [
            "id"=>1,
            "question"=> "Mentre dorme, il tuo bambino russa più di metà della notte?",
            "field" => "sleep_snore_half"
        ],
        [
            "id"=>2,
            "question"=> "Mentre dorme, il tuo bambino russa sempre?",
            "field" => "sleep_snore_always"
        ],
        [
            "id"=>3,
            "question"=> "Mentre dorme, il tuo bambino russa forte?",
            "field" => "sleep_snore_heavily"
        ],
        [
            "id"=>4,
            "question"=>"Mentre dorme, il tuo bambino ha un respiro pesante o rumoroso?",
            "field"=>"sleep_breath_loudly"
        ],
        [
            "id"=>5,
            "question"=> "Mentre dorme, il tuo bambino ha un respiro difficoltoso o fatica a respirare?",
            "field" => "sleep_breath_difficulty"
        ],
        [
            "id"=>6,
            "question"=> "Hai mai visto il tuo bambino fare delle pause respiratorie durante la notte?",
            "field" => "sleep_breath_pause"
        ],
        [
            "id"=>7,
            "question"=> "Il tuo bambino tende a respirare con la bocca aperta durante il giorno?",
            "field" => "breath_mouth_open"
        ],
        [
            "id"=>8,
            "question"=> "Il tuo bambino al mattino, quando si sveglia, ha la bocca secca?",
            "field" => "morning_dry_mouth"
        ],
        [
            "id"=>9,
            "question"=> "Il tuo bambino occasionalmente bagna il letto?",
            "field" => "wet_bed"
        ],
        [
            "id"=>10,
            "question"=> "Il tuo bambino si sveglia poco riposato al mattino?",
            "field" => "wake_not_rested"
        ],
        [
            "id"=>11,
            "question"=> "Il tuo bambino ha problemi di sonnolenza durante il giorno?",
            "field" => "day_drowsiness"
        ],
        [
            "id"=>12,
            "question"=> "Gli insegnanti hanno fatto notare che il tuo bambino appare assonnato durante il giorno?",
            "field" => "teacher_drowsiness"
        ],
        [
            "id"=>13,
            "question"=> "E' difficile svegliare il tuo bambino al mattino?",
            "field" => "morning_wake_difficulty"
        ],
        [
            "id"=>14,
            "question"=> "Il tuo bambino si sveglia con il mal di testa al mattino?",
            "field" => "morning_headache"
        ],
        [
            "id"=>15,
            "question"=> "Il tuo bambino ha smesso di crescere regolarmente in un certo periodo della vita?",
            "field" => "stopped_growing"
        ],
        [
            "id"=>16,
            "question"=> "Il tuo bambino è in sovrappeso?",
            "field" => "overweight"
        ],
        [
            "id"=>17,
            "question"=> "Il tuo bambino spesso non sembra ascoltare quando gli si parla direttamente?",
            "field" => "not_listening"
        ],
        [
            "id"=>18,
            "question"=> "Il tuo bambino ha difficoltà ad organizzare compiti ed attività?",
            "field" => "organising_tasks_difficulty"
        ],
        [
            "id"=>19,
            "question"=> "Il tuo bambino è facilmente distratto da stimoli esterni?",
            "field" => "easily_distracted"
        ],
        [
            "id"=>20,
            "question"=> "Il tuo bambino si agita con le mani o con i piedi o appare irrequieto quando sta seduto?",
            "field" => "agitate_when_sit"
        ],
        [
            "id"=>21,
            "question"=> "Il tuo bambino è sempre in movimento o agisce come se fosse ipercinetico?",
            "field" => "hyperkinetic"
        ],
        [
            "id"=>22,
            "question"=> "Il tuo bambino interrompe o si intromette fra gli altri (si inserisce dentro conversazioni o giochi)?",
            "field" => "interrupts_others"
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sleep_snore_half',
        'sleep_snore_always',
        'sleep_snore_heavily',
        'sleep_breath_loudly',
        'sleep_breath_difficulty',
        'breath_mouth_open',
        'morning_dry_mouth',
        'sleep_breath_pause',
        'wet_bed',
        'wake_not_rested',
        'day_drowsiness',
        'teacher_drowsiness',
        'morning_wake_difficulty',
        'morning_headache',
        'stopped_growing',
        'overweight',
        'not_listening',
        'organising_tasks_difficulty',
        'easily_distracted',
        'agitate_when_sit',
        'hyperkinetic',
        'interrupts_others',
        'checked_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'checked_at' => 'datetime'
    ];

    public function user(){
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function toQuestionArray(){
        return array_map(function($element){
            $field = $element["field"];
            $answer = $this->$field;
            $element["answer"] = $answer !== null ? ($answer == 1 ? "Sì" : "No") : "Non so";
            return $element;
        }, $this->questionArray);
    }

    public function numberOfAnswers(){
        $num = 0;
        
        if($this->sleep_snore_half !== null){
            $num++;
        }
        if($this->sleep_snore_always !== null){
            $num++;
        }
        if($this->sleep_snore_heavily !== null){
            $num++;
        }
        if($this->sleep_breath_loudly !== null){
            $num++;
        }
        if($this->sleep_breath_difficulty !== null){
            $num++;
        }
        if($this->breath_mouth_open !== null){
            $num++;
        }
        if($this->morning_dry_mouth !== null){
            $num++;
        }
        if($this->sleep_breath_pause !== null){
            $num++;
        }
        if($this->wet_bed !== null){
            $num++;
        }
        if($this->wake_not_rested !== null){
            $num++;
        }
        if($this->day_drowsiness !== null){
            $num++;
        }
        if($this->teacher_drowsiness !== null){
            $num++;
        }
        if($this->morning_wake_difficulty !== null){
            $num++;
        }
        if($this->morning_headache !== null){
            $num++;
        }
        if($this->stopped_growing !== null){
            $num++;
        }
        if($this->overweight !== null){
            $num++;
        }
        if($this->not_listening !== null){
            $num++;
        }
        if($this->organising_tasks_difficulty !== null){
            $num++;
        }
        if($this->easily_distracted !== null){
            $num++;
        }
        if($this->agitate_when_sit !== null){
            $num++;
        }
        if($this->hyperkinetic !== null){
            $num++;
        }
        if($this->interrupts_others !== null){
            $num++;
        }
        return $num;
    }

    public function score(){
        $num = 0.0;
        $den = 0.0;

        if($this->sleep_snore_half !== null){
            $den++;
            if($this->sleep_snore_half == 1){
                $num++;
            }
        }
        if($this->sleep_snore_always !== null){
            $den++;
            if($this->sleep_snore_always == 1){
                $num++;
            }
        }
        if($this->sleep_snore_heavily !== null){
            $den++;
            if($this->sleep_snore_heavily == 1){
                $num++;
            }
        }
        if($this->sleep_breath_loudly !== null){
            $den++;
            if($this->sleep_breath_loudly == 1){
                $num++;
            }
        }
        if($this->sleep_breath_difficulty !== null){
            $den++;
            if($this->sleep_breath_difficulty == 1){
                $num++;
            }
        }
        if($this->breath_mouth_open !== null){
            $den++;
            if($this->breath_mouth_open == 1){
                $num++;
            }
        }
        if($this->morning_dry_mouth !== null){
            $den++;
            if($this->morning_dry_mouth == 1){
                $num++;
            }
        }
        if($this->sleep_breath_pause !== null){
            $den++;
            if($this->sleep_breath_pause == 1){
                $num++;
            }
        }
        if($this->wet_bed !== null){
            $den++;
            if($this->wet_bed == 1){
                $num++;
            }
        }
        if($this->wake_not_rested !== null){
            $den++;
            if($this->wake_not_rested == 1){
                $num++;
            }
        }
        if($this->day_drowsiness !== null){
            $den++;
            if($this->day_drowsiness == 1){
                $num++;
            }
        }
        if($this->teacher_drowsiness !== null){
            $den++;
            if($this->teacher_drowsiness == 1){
                $num++;
            }
        }
        if($this->morning_wake_difficulty !== null){
            $den++;
            if($this->morning_wake_difficulty == 1){
                $num++;
            }
        }
        if($this->morning_headache !== null){
            $den++;
            if($this->morning_headache == 1){
                $num++;
            }
        }
        if($this->stopped_growing !== null){
            $den++;
            if($this->stopped_growing == 1){
                $num++;
            }
        }
        if($this->overweight !== null){
            $den++;
            if($this->overweight == 1){
                $num++;
            }
        }
        if($this->not_listening !== null){
            $den++;
            if($this->not_listening == 1){
                $num++;
            }
        }
        if($this->organising_tasks_difficulty !== null){
            $den++;
            if($this->organising_tasks_difficulty == 1){
                $num++;
            }
        }
        if($this->easily_distracted !== null){
            $den++;
            if($this->easily_distracted == 1){
                $num++;
            }
        }
        if($this->agitate_when_sit !== null){
            $den++;
            if($this->agitate_when_sit == 1){
                $num++;
            }
        }
        if($this->hyperkinetic !== null){
            $den++;
            if($this->hyperkinetic == 1){
                $num++;
            }
        }
        if($this->interrupts_others !== null){
            $den++;
            if($this->interrupts_others == 1){
                $num++;
            }
        }
        if($den == 0.0){
            return 0.0;
        }
        return round($num/$den, 2);
    }
}
