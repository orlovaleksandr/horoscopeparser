<?php
namespace OrlovAleksander\HoroscopeParser;

class HoroscopeParser
{
    /**
     * Formatted and parsed XML after fetching it from https://ignio.co m/static/r/public/export/xml.html
     *
     * @var array
     */
    protected $parsed_xml = [];

    /**
     * XML File url
     *
     * @var string
     */
    protected $url = 'https://ignio.com/r/export/utf/xml/weekly/cur.xml';

    const SIGNS = [
        'aries' => 'Овен',
        'taurus' => 'Телец',
        'gemini' => 'Близнецы',
        'cancer' => 'Рак',
        'leo' => 'Лев',
        'virgo' => 'Дева',
        'libra' => 'Весы',
        'scorpio' => 'Скорпион',
        'sagittarius' => 'Стрелец',
        'capricorn' => 'Козерог',
        'aquarius' => 'Водолей',
        'pisces' => 'Рыбы'
    ];

    const DATES = [
        'Овен' => '21 марта - 20 апреля',
        'Телец' => '21 апреля - 21 мая',
        'Близнецы' => '22 мая - 21 июня',
        'Рак' => '22 июня - 23 июля',
        'Лев' => '24 июля - 23 августа',
        'Дева' => '24 августа - 23 сентября',
        'Весы' => '24 сентября - 23 октября',
        'Скорпион' => '24 октября - 22 ноября',
        'Стрелец' => '23 ноября - 21 декабря',
        'Козерог' => '22 декабря - 20 января',
        'Водолей' => '21 января - 19 февраля',
        'Рыбы' => '20 февраля - 20 марта'
    ];

    const THEMES = [
        'common' => 'Общий',
        'business' => 'Бизнес',
        'love' => 'Семья, любовь',
        'car' => 'Автомобильный',
        'health' => 'Здоровье',
        'shop' => 'Шоппинг',
        'beauty' => 'Красота',
        'erotic' => 'Эротический',
        'gold' => 'Ювелирный',
    ];

    /**
     * Load XML from the API endpoint and store it in a cached file.
     *
     * @return HoroscopeParser
     * @throws Exception
     */
    protected function loadXml()
    {
        $cache_file = 'files/import/horoscope/' .  (new DateTime('now'))->format('Y-m-d') . '.xml';

        if (!file_exists($cache_file)) {
            $contents = file_get_contents($this->url);
            file_put_contents($cache_file, $contents);
        }

        $xml = simplexml_load_file($cache_file);

        $this->parsed_xml = $this->parseXml($xml);

        return $this;
    }


    /**
     * Parse and format the XML from endpoint and store it in array.
     *
     * @param SimpleXMLElement $xml
     * @return array
     */
    protected function parseXml($xml)
    {
        $array = [];

        foreach ($xml as $k => $sign) {
            if ($k == 'date') continue;

            foreach ($sign as $type => $data){

                $array[self::THEMES[$type]][self::SIGNS[$k]] = (string)$data;
            }
        }


        return $array;
    }

    public function getXml()
    {
        $this->loadXml();
        return $this->parsed_xml;
    }

}
