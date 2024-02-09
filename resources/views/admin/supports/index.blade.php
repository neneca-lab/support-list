<script src="https://kit.fontawesome.com/5f03d44b65.js" crossorigin="anonymous"></script>
<style>

    body {
        background-color: #fc5d5d;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    h1{
        font-family: Arial;
    }

    .custom-btn {
        width: 130px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
        7px 7px 20px 0px rgba(0,0,0,.1),
        4px 4px 5px 0px rgba(0,0,0,.1);
        outline: none;
    }

    .btn-2 {
        background: rgb(96,9,240);
        background: linear-gradient(0deg, rgba(96,9,240,1) 0%, rgba(129,5,240,1) 100%);
        border: none;

    }
    .btn-2:before {
        height: 0%;
        width: 2px;
    }
    .btn-2:hover {
        box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
        -4px -4px 6px 0 rgba(116, 125, 136, .5),
        inset -4px -4px 6px 0 rgba(255,255,255,.2),
        inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
    }

    .container {
        text-align: center;
    }

    table {
        margin-top: 20px;
    }


</style>

<div class="container">
    <h1>Listagem dos suportes</h1>

    <a href="{{ route('supports.create') }}"><button class="custom-btn btn-2">Criar duvida</button></a>

    <table>
        <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($supports as $support)
            <tr>
                <td>{{$support['subject']}}</td>
                <td>{{$support['status']}}</td>
                <td>{{$support['body']}}</td>
                <td>
                    <a href="{{ route('supports.show', $support['id']) }}"><button class=""><i class="fa-solid fa-arrow-right"></i></button></a>
                    <a href="{{ route('supports.edit', $support['id']) }}"><button class=""><i class="fa-solid fa-pen-to-square"></i></button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

