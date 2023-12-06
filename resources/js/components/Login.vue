<template>
    <div class="flex justify-center items-center">
        <form @submit.prevent="login" class="bg-white shadow-md rounded p-8">
            <div>
                <label for="">Email</label>
                <input v-model="email" type="email" id="email" placeholder="Correo electrónico">
            </div>
            <div>
                <label for="">Password</label>
                <input v-model="password" type="password" id="password" placeholder="Contraseña">
            </div>
            <button type="submit" class="bg-blue-500 text-white font-bold p-8">
                Login
            </button>
        </form>

    </div>
</template>

<script>
    export default{
        data(){
            return{
                email: '',
                password: '',
            };
        },
        methods:{
            login(){
                axios
                    .post('api/login',{
                        email : this.email,
                        password: this.password,
                    })
                    .then((response) => {
                        alert(response.data.token);
                        alert("Inicio OK");
                        localStorage.setItem('token', response.data.token);

                    })
                    .catch((error) => {
                        alert("Error inicio de sesion");
                        console.error('Error de inicio de sesion:' , error)
                    });
            },
        },
    };
</script>
