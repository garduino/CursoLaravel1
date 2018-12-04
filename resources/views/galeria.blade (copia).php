@extends("layouts.plantilla")

@section("cabecera")

@endsection



@section("infoGeneral")


    <h1>Aquí iría el contenido general de la página</h1>

    @if(count($alumnos))

        <table width="50%" border="1">

        @foreach($alumnos as $persona)

        <tr>

            <td>

                {{$persona}}


            </td>


        </tr>

        @endforeach

        </table>
    @else

        {{"Sin Alumnos"}}


    @endif


@endsection


@section("pie")



@endsection

