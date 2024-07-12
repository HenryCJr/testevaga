<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos -- FHCJr</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
   
    <link rel="stylesheet" href="/css/styles.css">

</head>
<body>
    
<div id="app">

    <div class="navbar" style="margin: -10px; background-color: rgb(80, 24, 10); width: 105%; height:100px; box-shadow: -1px 1px 5px 1px #161616 inset;">
                
        <a href="{{url('contatos/create')}}">
            <input style="z-index: 50;display: inline-block;
                                    outline: 0px;
                                    cursor: pointer;
                                    border-radius: 6px;
                                    border: 2px solid rgb(255, 71, 66);
                                    color: rgb(255, 255, 255);
                                    background-color: rgb(255, 71, 66);
                                    padding: 8px;
                                    box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                                    font-weight: 800;
                                    font-size: 16px;
                                    height: 42px;" type="submit" value="Adicionar Contato">
                                   
        </a>
        
    </div>
    
    <div class="cont-container" style="margin-top: 20px;">
        @csrf
        
        @foreach ($contatos as $contato)   
        <div class="about-container">
         
            <div style="position: relative; width: 100%;">
                <h2>{{$contato->nm_contato}}</h2>
            </div>
            <div class="card-content">
                <div class="contact">
                    <a href="https://api.whatsapp.com/send?l=pt&phone={{$contato->nm_telefone}}"><h3>{{$contato->nm_telefone}}</h3></a>
                    <h3>{{$contato->nm_email}}</h3>
                </div>
                <p>{{$contato->nm_obs}}</p>
                    
                <a @click.prevent="deleteCont({{$contato->id}})">
                    <input style="z-index: 50;display: inline-block;
                                    outline: 0px;
                                    cursor: pointer;
                                    border-radius: 6px;
                                    border: 2px solid rgb(255, 71, 66);
                                    color: rgb(255, 255, 255);
                                    background-color: rgb(255, 71, 66);
                                    padding: 8px;
                                    box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                                    font-weight: 800;
                                    font-size: 16px;
                                    height: 42px;" type="submit" value="Deletar">
                </a>   
                
                <a href="{{url('contatos/' . $contato->id . '/edit')}}">
                    <input style="z-index: 50;display: inline-block;
                                    outline: 0px;
                                    cursor: pointer;
                                    border-radius: 6px;
                                    border: 2px solid rgb(66, 170, 255);
                                    color: rgb(255, 255, 255);
                                    background-color: rgb(66, 164, 255);
                                    padding: 8px;
                                    box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                                    font-weight: 800;
                                    font-size: 16px;
                                    height: 42px;" type="submit" value="Editar">
                </a>
            </div>
        
        </div>
        
        @endforeach

        
    </div>
    
    
    <div v-if='loading' class="about-container">
        <strong>Aguarde...</strong>
    </div>


   
</div>
        
<script>
    const app = Vue.createApp({
  el: '#app',
  data() {
    return {
      loading: false
    }
  },
  methods: {
    async deleteCont(id) {
      console.log('Para de clicar');
      this.loading = true;
      try {
        // Box de confirmação de delete
        const confirmDelete = confirm("Tem certeza que deseja excluir este contato?");

        if (!confirmDelete) {
          return;
        }
        
        // Tentei usar a mesma rota de antes pra fazer a requisição
        // const response = await this.request('http://localhost:38080/contatos/remover/' + id, 'POST');
    
        const response = await fetch(`http://localhost:38080/contatos/remover/${id}`, {method: 'GET'});

        if (response) {
            this.loading = false;
            window.location.reload();
        }
      } catch (error) {
        this.loading = false;
        console.error("Erro ao excluir:", error);
      }
    },
  }
});
app.mount('#app');
</script>



</body>
</html>