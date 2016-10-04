    @extends('template')

    @section('title')
        Minhas Anotações
    @stop

    @section('content')

        <h1>Anotações</h1>
            <ul>
                <?php
                /*
                foreach($notas as $nota)
                    //print "<li>$nota</li>";
                */
                ?>
                @foreach($notas as $nota)
                    <li> {{ $nota }} </li>
                @endforeach

                <li>Anotação 2...</li>
                <li>Anotação 3...</li>
                <li>Anotação 4...</li>
            </ul>
    @stop