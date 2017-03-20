<?php
use Migrations\AbstractSeed;

/**
 * Areas seed.
 */
class AreasSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run(){
        $data = [
  [
      "id"=> 1,
    "prefecture"=> "Tokyo",
    "ward"=> "Akishima"
  ],
  [
      "id"=> 2,
    "prefecture"=> "Tokyo",
    "ward"=> "Adachi-Ku"
  ],
  [
      "id"=> 3,
    "prefecture"=> "Tokyo",
    "ward"=> "Bunkyo-Ku"
  ],
  [
      "id"=> 4,
    "prefecture"=> "Tokyo",
    "ward"=> "Chuo-Ku"
  ],
  [
      "id"=> 5,
    "prefecture"=> "Tokyo",
    "ward"=> "Chofu"
  ],
  [
      "id"=> 6,
    "prefecture"=> "Tokyo",
    "ward"=> "Chiyoda-Ku"
  ],
  [
      "id"=> 7,
    "prefecture"=> "Tokyo",
    "ward"=> "Edogawa-Ku"
  ],
  [
      "id"=> 8,
    "prefecture"=> "Tokyo",
    "ward"=> "Fuchu"
  ],
  [
      "id"=> 9,
    "prefecture"=> "Tokyo",
    "ward"=> "Fussa"
  ],
  [
      "id"=> 10,
    "prefecture"=> "Tokyo",
    "ward"=> "Hachioji"
  ],
  [
      "id"=> 11,
    "prefecture"=> "Tokyo",
    "ward"=> "Hamura"
  ],
  [
      "id"=> 12,
    "prefecture"=> "Tokyo",
    "ward"=> "Higashikurume"
  ],
  [
      "id"=> 13,
    "prefecture"=> "Tokyo",
    "ward"=> "Higashimurayama"
  ],
  [
      "id"=> 14,
    "prefecture"=> "Tokyo",
    "ward"=> "Hino"
  ],
  [
      "id"=> 15,
    "prefecture"=> "Tokyo",
    "ward"=> "Inagi"
  ],
  [
      "id"=> 16,
    "prefecture"=> "Tokyo",
    "ward"=> "Itabashi-Ku"
  ],
  [
      "id"=> 17,
    "prefecture"=> "Tokyo",
    "ward"=> "Kita-Ku"
  ],
  [
      "id"=> 18,
    "prefecture"=> "Tokyo",
    "ward"=> "Koto-Ku"
  ],
  [
      "id"=> 19,
    "prefecture"=> "Tokyo",
    "ward"=> "Kiyose"
  ],
  [
      "id"=> 20,
    "prefecture"=> "Tokyo",
    "ward"=> "Komae"
  ],
  [
      "id"=> 21,
    "prefecture"=> "Tokyo",
    "ward"=> "Kunitachi"
  ],
  [
      "id"=> 22,
    "prefecture"=> "Tokyo",
    "ward"=> "Koganei"
  ],
  [
      "id"=> 23,
    "prefecture"=> "Tokyo",
    "ward"=> "Kokubunji"
  ],
  [
      "id"=> 24,
    "prefecture"=> "Tokyo",
    "ward"=> "Kodaira"
  ],
  [
      "id"=> 25,
    "prefecture"=> "Tokyo",
    "ward"=> "Katsushika-Ku"
  ],
  [
      "id"=> 26,
    "prefecture"=> "Tokyo",
    "ward"=> "Meguro-Ku"
  ],
  [
      "id"=> 27,
    "prefecture"=> "Tokyo",
    "ward"=> "Minato-Ku"
  ],
  [
      "id"=> 28,
    "prefecture"=> "Tokyo",
    "ward"=> "Mitaka"
  ],
  [
      "id"=> 29,
    "prefecture"=> "Tokyo",
    "ward"=> "Musashino"
  ],
  [
      "id"=> 30,
    "prefecture"=> "Tokyo",
    "ward"=> "Mushashimurayama"
  ],
  [
      "id"=> 31,
    "prefecture"=> "Tokyo",
    "ward"=> "Machida"
  ],
  [
      "id"=> 32,
    "prefecture"=> "Tokyo",
    "ward"=> "Nishitokyo"
  ],
  [
      "id"=> 33,
    "prefecture"=> "Tokyo",
    "ward"=> "Nerima-Ku"
  ],
  [
      "id"=> 34,
    "prefecture"=> "Tokyo",
    "ward"=> "Nakano-Ku"
  ],
  [
      "id"=> 35,
    "prefecture"=> "Tokyo",
    "ward"=> "Ota-Ku"
  ],
  [
      "id"=> 36,
    "prefecture"=> "Tokyo",
    "ward"=> "Shibuya-Ku"
  ],
  [
      "id"=> 37,
    "prefecture"=> "Tokyo",
    "ward"=> "Setagaya-Ku"
  ],
  [
      "id"=> 38,
    "prefecture"=> "Tokyo",
    "ward"=> "Shinagawa-Ku"
  ],
  [
      "id"=> 39,
    "prefecture"=> "Tokyo",
    "ward"=> "Sumida-Ku"
  ],
  [
      "id"=> 40,
    "prefecture"=> "Tokyo",
    "ward"=> "Shinjuku-Ku"
  ],
  [
      "id"=> 41,
    "prefecture"=> "Tokyo",
    "ward"=> "Taito-Ku"
  ],
  [
      "id"=> 42,
    "prefecture"=> "Tokyo",
    "ward"=> "Tama"
  ],
  [
      "id"=> 43,
    "prefecture"=> "Tokyo",
    "ward"=> "Tachikawa"
  ],
  [
      "id"=> 44,
    "prefecture"=> "Tokyo",
    "ward"=> "Toshima-Ku"
  ],
  [
      "id"=> 45,
    "prefecture"=> "Kanagawa",
    "ward"=> "Atsugi"
  ],
  [
      "id"=> 46,
    "prefecture"=> "Kanagawa",
    "ward"=> "Asao-Ku Kawasaki"
  ],
  [
      "id"=> 47,
    "prefecture"=> "Kanagawa",
    "ward"=> "Asahi-Ku Yokohama"
  ],
  [
      "id"=> 48,
    "prefecture"=> "Kanagawa",
    "ward"=> "Aoba-Ku Yokohama"
  ],
  [
      "id"=> 49,
    "prefecture"=> "Kanagawa",
    "ward"=> "Chigasaki"
  ],
  [
      "id"=> 50,
    "prefecture"=> "Kanagawa",
    "ward"=> "Chuo-Ku Sagamihara"
  ],
  [
      "id"=> 51,
    "prefecture"=> "Kanagawa",
    "ward"=> "Ebina"
  ],
  [
      "id"=> 52,
    "prefecture"=> "Kanagawa",
    "ward"=> "Fujisawa"
  ],
  [
      "id"=> 53,
    "prefecture"=> "Kanagawa",
    "ward"=> "Hadano"
  ],
  [
      "id"=> 54,
    "prefecture"=> "Kanagawa",
    "ward"=> "Hiratsuka"
  ],
  [
      "id"=> 55,
    "prefecture"=> "Kanagawa",
    "ward"=> "Hodogaya-Ku Yokohama"
  ],
  [
      "id"=> 56,
    "prefecture"=> "Kanagawa",
    "ward"=> "Isogo-Ku Yokohama"
  ],
  [
      "id"=> 57,
    "prefecture"=> "Kanagawa",
    "ward"=> "Kamakura"
  ],
  [
      "id"=> 58,
    "prefecture"=> "Kanagawa",
    "ward"=> "Kawasaki-Ku Kawasaki"
  ],
  [
      "id"=> 59,
    "prefecture"=> "Kanagawa",
    "ward"=> "Kanagawa-Ku Yokohama"
  ],
  [
      "id"=> 60,
    "prefecture"=> "Kanagawa",
    "ward"=> "Kanazawa-Ku Yokohama"
  ],
  [
      "id"=> 61,
    "prefecture"=> "Kanagawa",
    "ward"=> "Kohoku-Ku Yokohama"
  ],
  [
      "id"=> 62,
    "prefecture"=> "Kanagawa",
    "ward"=> "Konan-Ku Yokohama"
  ],
  [
      "id"=> 63,
    "prefecture"=> "Kanagawa",
    "ward"=> "Miyamae-Ku Kawasaki"
  ],
  [
      "id"=> 64,
    "prefecture"=> "Kanagawa",
    "ward"=> "Minami-Ku Sagamihara"
  ],
  [
      "id"=> 65,
    "prefecture"=> "Kanagawa",
    "ward"=> "Midori-Ku Sagamihara"
  ],
  [
      "id"=> 66,
    "prefecture"=> "Kanagawa",
    "ward"=> "Minami-Ku Yokohama"
  ],
  [
      "id"=> 67,
    "prefecture"=> "Kanagawa",
    "ward"=> "Midori-Ku Yokohama"
  ],
  [
      "id"=> 68,
    "prefecture"=> "Kanagawa",
    "ward"=> "Nakahara-Ku Kawasaki"
  ],
  [
      "id"=> 69,
    "prefecture"=> "Kanagawa",
    "ward"=> "Naka-Ku Yokohama"
  ],
  [
      "id"=> 70,
    "prefecture"=> "Kanagawa",
    "ward"=> "Saiwai-Ku Kawasaki"
  ],
  [
      "id"=> 71,
    "prefecture"=> "Kanagawa",
    "ward"=> "Seya-Ku Yokohama"
  ],
  [
      "id"=> 72,
    "prefecture"=> "Kanagawa",
    "ward"=> "Sekae-Ku Yokohama"
  ],
  [
      "id"=> 73,
    "prefecture"=> "Kanagawa",
    "ward"=> "Tama-Ku Kawasaki"
  ],
  [
      "id"=> 74,
    "prefecture"=> "Kanagawa",
    "ward"=> "Takatsu-Ku Kawasaki"
  ],
  [
      "id"=> 75,
    "prefecture"=> "Kanagawa",
    "ward"=> "Totsuka-Ku Yokohama"
  ],
  [
      "id"=> 76,
    "prefecture"=> "Kanagawa",
    "ward"=> "Tsuduki-Ku Yokohama"
  ],
  [
      "id"=> 77,
    "prefecture"=> "Kanagawa",
    "ward"=> "Tsurumi-Ku Yokohama"
  ],
  [
      "id"=> 78,
    "prefecture"=> "Kanagawa",
    "ward"=> "Yamato"
  ],
  [
      "id"=> 79,
    "prefecture"=> "Kanagawa",
    "ward"=> "Yokosuka"
  ],
  [
      "id"=> 80,
    "prefecture"=> "Kanagawa",
    "ward"=> "Zama"
  ],
  [
      "id"=> 81,
    "prefecture"=> "Saitama",
    "ward"=> "Ageo"
  ],
  [
      "id"=> 82,
    "prefecture"=> "Saitama",
    "ward"=> "Asaka"
  ],
  [
      "id"=> 83,
    "prefecture"=> "Saitama",
    "ward"=> "Chuo-Ku Saitama"
  ],
  [
      "id"=> 84,
    "prefecture"=> "Saitama",
    "ward"=> "Fujimi"
  ],
  [
      "id"=> 85,
    "prefecture"=> "Saitama",
    "ward"=> "Hidaka"
  ],
  [
      "id"=> 86,
    "prefecture"=> "Saitama",
    "ward"=> "Iruma"
  ],
  [
      "id"=> 87,
    "prefecture"=> "Saitama",
    "ward"=> "Konosu"
  ],
  [
      "id"=> 88,
    "prefecture"=> "Saitama",
    "ward"=> "Kitamoto"
  ],
  [
      "id"=> 89,
    "prefecture"=> "Saitama",
    "ward"=> "Kawaguchi"
  ],
  [
      "id"=> 90,
    "prefecture"=> "Saitama",
    "ward"=> "Kawagoe"
  ],
  [
      "id"=> 91,
    "prefecture"=> "Saitama",
    "ward"=> "Kasukabe"
  ],
  [
      "id"=> 92,
    "prefecture"=> "Saitama",
    "ward"=> "Kita-Ku Saitama"
  ],
  [
      "id"=> 93,
    "prefecture"=> "Saitama",
    "ward"=> "Koshigaya"
  ],
  [
      "id"=> 94,
    "prefecture"=> "Saitama",
    "ward"=> "Kuki"
  ],
  [
      "id"=> 95,
    "prefecture"=> "Saitama",
    "ward"=> "Minami-Ku Saitama"
  ],
  [
      "id"=> 96,
    "prefecture"=> "Saitama",
    "ward"=> "Misato"
  ],
  [
      "id"=> 97,
    "prefecture"=> "Saitama",
    "ward"=> "Midori-Ku Saitama"
  ],
  [
      "id"=> 98,
    "prefecture"=> "Saitama",
    "ward"=> "Minuma-Ku Saitama"
  ],
  [
      "id"=> 99,
    "prefecture"=> "Saitama",
    "ward"=> "Niiza"
  ],
  [
      "id"=> 100,
    "prefecture"=> "Saitama",
    "ward"=> "Okegawa"
  ],
  [
      "id"=> 101,
    "prefecture"=> "Saitama",
    "ward"=> "Omiya-Ku Saitama"
  ],
  [
      "id"=> 102,
    "prefecture"=> "Saitama",
    "ward"=> "Sakura-Ku Saitama"
  ],
  [
      "id"=> 103,
    "prefecture"=> "Saitama",
    "ward"=> "Sakado"
  ],
  [
      "id"=> 104,
    "prefecture"=> "Saitama",
    "ward"=> "Satte"
  ],
  [
      "id"=> 105,
    "prefecture"=> "Saitama",
    "ward"=> "Sayama"
  ],
  [
      "id"=> 106,
    "prefecture"=> "Saitama",
    "ward"=> "Soka"
  ],
  [
      "id"=> 107,
    "prefecture"=> "Saitama",
    "ward"=> "Toda"
  ],
  [
      "id"=> 108,
    "prefecture"=> "Saitama",
    "ward"=> "Tokorozawa"
  ],
  [
      "id"=> 109,
    "prefecture"=> "Saitama",
    "ward"=> "Tsurugashima"
  ],
  [
      "id"=> 110,
    "prefecture"=> "Saitama",
    "ward"=> "Urawa-Ku Saitama"
  ],
  [
      "id"=> 111,
    "prefecture"=> "Saitama",
    "ward"=> "Warabi"
  ],
  [
      "id"=> 112,
    "prefecture"=> "Saitama",
    "ward"=> "Wako"
  ],
  [
      "id"=> 113,
    "prefecture"=> "Saitama",
    "ward"=> "Yashio"
  ],
  [
      "id"=> 114,
    "prefecture"=> "Saitama",
    "ward"=> "Yoshikawa"
  ],
  [
      "id"=> 115,
    "prefecture"=> "Chiba",
    "ward"=> "Abiko"
  ],
  [
      "id"=> 116,
    "prefecture"=> "Chiba",
    "ward"=> "Chuo-Ku Chiba"
  ],
  [
      "id"=> 117,
    "prefecture"=> "Chiba",
    "ward"=> "Funabashi"
  ],
  [
      "id"=> 118,
    "prefecture"=> "Chiba",
    "ward"=> "Hanamigawa-Ku Chiba"
  ],
  [
      "id"=> 119,
    "prefecture"=> "Chiba",
    "ward"=> "Inage-Ku Chiba"
  ],
  [
      "id"=> 120,
    "prefecture"=> "Chiba",
    "ward"=> "Inzai"
  ],
  [
      "id"=> 121,
    "prefecture"=> "Chiba",
    "ward"=> "Ichikawa"
  ],
  [
      "id"=> 122,
    "prefecture"=> "Chiba",
    "ward"=> "Kashiwa"
  ],
  [
      "id"=> 123,
    "prefecture"=> "Chiba",
    "ward"=> "Kamagaya"
  ],
  [
      "id"=> 124,
    "prefecture"=> "Chiba",
    "ward"=> "Matsudo"
  ],
  [
      "id"=> 125,
    "prefecture"=> "Chiba",
    "ward"=> "Mihama-Ku Chiba"
  ],
  [
      "id"=> 126,
    "prefecture"=> "Chiba",
    "ward"=> "Narita"
  ],
  [
      "id"=> 127,
    "prefecture"=> "Chiba",
    "ward"=> "Narashino"
  ],
  [
      "id"=> 128,
    "prefecture"=> "Chiba",
    "ward"=> "Nagareyama"
  ],
  [
      "id"=> 129,
    "prefecture"=> "Chiba",
    "ward"=> "Shiroi"
  ],
  [
      "id"=> 130,
    "prefecture"=> "Chiba",
    "ward"=> "Sakura"
  ],
  [
      "id"=> 131,
    "prefecture"=> "Chiba",
    "ward"=> "Urayasu"
  ],
  [
      "id"=> 132,
    "prefecture"=> "Chiba",
    "ward"=> "Wakaba-Ku Chiba"
  ],
  [
      "id"=> 133,
    "prefecture"=> "Chiba",
    "ward"=> "Yachiyo"
  ],
  [
      "id"=> 134,
    "prefecture"=> "Ibaraki",
    "ward"=> "Ryugasaki"
  ],
  [
      "id"=> 135,
    "prefecture"=> "Ibaraki",
    "ward"=> "Toride"
  ],
  [
      "id"=> 136,
    "prefecture"=> "Ibaraki",
    "ward"=> "Tsukuba"
  ],
  [
      "id"=> 137,
    "prefecture"=> "Ibaraki",
    "ward"=> "Ushiku"
  ]
];

        $table = $this->table('areas');
        $table->insert($data)->save();
    }
}
