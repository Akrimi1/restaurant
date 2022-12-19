<?php



namespace App\DataTables;



use App\Models\Terms;

use App\Models\CustomField;

use Yajra\DataTables\Services\DataTable;

use Yajra\DataTables\EloquentDataTable;

use Barryvdh\DomPDF\Facade as PDF;



class TermsDataTable extends DataTable

{

    /**

     * custom fields columns

     * @var array

     */

    public static $customFields = [];



    /**

     * Build DataTable class.

     *

     * @param mixed $query Results from query() method.

     * @return \Yajra\DataTables\DataTableAbstract

     */

    public function dataTable($query)

    {

        $dataTable = new EloquentDataTable($query);

        $columns = array_column($this->getColumns(), 'data');

        $dataTable = $dataTable

            ->editColumn('updated_at', function ($term) {

                return getDateColumn($term, 'updated_at');

            })

            ->addColumn('action', 'terms.datatables_actions')

            ->rawColumns(array_merge($columns, ['action']));



        return $dataTable;

    }



    /**

     * Get query source of dataTable.

     *

     * @param \App\Models\Post $model

     * @return \Illuminate\Database\Eloquent\Builder

     */

    public function query(Terms $model)

    {

        return $model->newQuery()->select('terms.*');

    }



    /**

     * Optional method if you want to use html builder.

     *

     * @return \Yajra\DataTables\Html\Builder

     */

    public function html()

    {

        return $this->builder()

            ->columns($this->getColumns())

            ->minifiedAjax()

            ->addAction(['title'=>trans('lang.actions'),'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])

            ->parameters(array_merge(

                config('datatables-buttons.parameters'), [

                    'language' => json_decode(

                        file_get_contents(base_path('resources/lang/' . app()->getLocale() . '/datatable.json')

                        ), true)

                ]

            ));

    }



    /**

     * Get columns.

     *

     * @return array

     */

    protected function getColumns()

    {

        $columns = [

            [

                'data' => 'content',

                'title' => trans('lang.terms_content'),



            ],

           
          
            [

                'data' => 'updated_at',

                'title' => trans('lang.term_updated_at'),

                'searchable' => false,

            ]

        ];



        $hasCustomField = in_array(Terms::class, setting('custom_field_models', []));

        if ($hasCustomField) {

            $customFieldsCollection = CustomField::where('custom_field_model', Terms::class)->where('in_table', '=', true)->get();

            foreach ($customFieldsCollection as $key => $field) {

                array_splice($columns, $field->order - 1, 0, [[

                    'data' => 'custom_fields.' . $field->name . '.view',

                    'title' => trans('lang.term_' . $field->name),

                    'orderable' => false,

                    'searchable' => false,

                ]]);

            }

        }

        return $columns;

    }



    /**

     * Get filename for export.

     *

     * @return string

     */

    protected function filename()

    {

        return 'termsdatatable_' . time();

    }



    /**

     * Export PDF using DOMPDF

     * @return mixed

     */

    public function pdf()

    {

        $data = $this->getDataForPrint();

        $pdf = PDF::loadView($this->printPreview, compact('data'));

        return $pdf->download($this->filename() . '.pdf');

    }

}