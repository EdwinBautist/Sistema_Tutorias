<div class="border-dashed rounded-base border-1 p-4 text-center">
    <h2>SELECCIONE UN ARCHIVO EXCEL</h2>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>            
        @endif

        @if (session('warning'))
            <div class="alert alert-warning" role="alert">
                {{ session('warning') }}
            </div>            
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>            
        @endif

        @if (session()->has('failures'))
            <div class="table-responsive my-3">
                <table class="table table-danger table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Fila Excel</th>
                            <th>Columna</th>
                            <th>Errores Encontrados</th>
                            <th>Valor Enviado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session()->get('failures') as $validation)
                            <tr>
                                <td>{{ is_array($validation) ? ($validation['row'] ?? 'N/A') : $validation->row() }}</td>
                                <td>
                                    <code>{{ is_array($validation) ? ($validation['attribute'] ?? '') : $validation->attribute() }}</code>
                                </td>
                                <td>
                                    <ul class="mb-0">
                                        @php
                                            $eList = is_array($validation) ? ($validation['errors'] ?? []) : $validation->errors();
                                        @endphp
                                        @foreach ($eList as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @php
                                        $values = is_array($validation) ? ($validation['values'] ?? []) : $validation->values();
                                        $attr = is_array($validation) ? ($validation['attribute'] ?? '') : $validation->attribute();
                                    @endphp
                                    {{ $values[$attr] ?? 'N/A / Vacío' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <div id="excel-import-results" aria-live="polite"></div>
        
    <form id="form-excel-alumno" class="max-w-lg mx-auto" method="POST" action="{{ route('alumnos.import') }}" enctype="multipart/form-data">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                id="file_input" type="file" accept=".xlsx, .xls" name="alumimport">
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Subir</button>
    </form>
</div>