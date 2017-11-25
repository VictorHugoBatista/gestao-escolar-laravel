<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Matéria</td>
                <td>Nota</td>
                <td>Faltas</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="boletim in boletins">
                <td>{{ boletim.materia }}</td>
                <td>{{ boletim.nota }}</td>
                <td>{{ boletim.faltas }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['alunoid'],
        data() {
           return {
               boletins: [],
           };
        },
        created() {
            axios.get('/boletim', {
                params: {
                     'alunoid': this.alunoid,
                },
            })
                .then(response => {
                    if (0 < response.data.boletins.length) {
                        this.boletins = response.data.boletins;
                    }
                });
        },
    }
</script>
