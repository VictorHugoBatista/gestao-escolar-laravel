<template>
    <div>
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
        <div class="form-inline">
            <div class="form-group">
                <label for="add-materia">Matéria</label>
                <input id="add-materia" class="form-control">
            </div>
            <div class="form-group">
                <label for="add-nota">Nota</label>
                <input id="add-nota" class="form-control">
            </div>
            <div class="form-group">
                <label for="add-faltas">Faltas</label>
                <input id="add-faltas" class="form-control">
            </div>
            <button id="add-button" class="btn btn-default">Adicionar</button>
        </div>
    </div>
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
