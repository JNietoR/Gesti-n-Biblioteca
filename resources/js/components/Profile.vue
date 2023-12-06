<template>
    <div>
        <h2>Perfil usuario: </h2>
        <div v-if="user">
            <p> Nombre: {{ user.name }}</p>
            <p> Correo: {{ user.email }}</p>
        </div>
        <button class="bggg-blue-500 text-white" @click="logout">
            Salir
        </button>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                user: null,
            };
        },
        mounted(){
            fetch('api/user',{
                method : 'GET',
                headers:{
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                },
            })
            .then((response) => response.json())
            .then((data) => {
                this.user = data;
            })
            .catch((error) => {
                console.error('Error al cargar los datos', error);
            });
        },
        methods: {
            logout(){
                fetch('/logout', {
                    method : 'POST',
                    headers:{
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    },
                })
                .then(() => {
                    localStorage.removeItem('token');
                    this.$router.push({name:'Login'});
                })
                .catch(() => {
                    console.error('Error al cerrar sesión', error)
                });
            },
        },
    };
</script>
