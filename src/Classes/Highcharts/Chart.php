<?php

namespace Ameon\Charts\Classes\Highcharts;

use Ameon\Charts\Classes\BaseChart;
use Ameon\Charts\Features\Highcharts\Chart as ChartFeatures;

class Chart extends BaseChart
{
    use ChartFeatures;

    /**
     * Chartjs dataset class.
     *
     * @var object
     */
    public $dataset = Dataset::class;

    /**
     * Initiates the Highcharts Line Chart.
     *
     * @return self
     */
    public function __construct()
    {
        parent::__construct();

        $this->container = 'charts::highcharts.container';
        $this->script = 'charts::highcharts.script';

        return $this->options([
            'credits' => [
                'enabled' => false,
            ],
            'title' => [
                'text' => null,
            ],
        ]);
    }

    /**
     * Format the options for highcharts.
     *
     * @return string
     */
    public function formatOptions(bool $strict = false, bool $noBraces = false)
    {
        if (count($this->labels) > 0) {
            $this->options([
                'xAxis' => [
                    'categories' => json_decode($this->formatLabels()),
                ],
            ]);
        }

        return parent::formatOptions($strict, $noBraces);
    }
}
