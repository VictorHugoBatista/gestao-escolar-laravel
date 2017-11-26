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
                <tr class="success" v-show="newBoletimHasData()">
                    <td>{{ newBoletim.materia }}</td>
                    <td>{{ newBoletim.nota }}</td>
                    <td>{{ newBoletim.faltas }}</td>
                </tr>
            </tbody>
        </table>
        <div class="form-inline">
            <div class="form-group">
                <label for="add-materia">Matéria</label>
                <input id="add-materia" class="form-control" v-on:keyup="updateNewBoletim">
            </div>
            <div class="form-group">
                <label for="add-nota">Nota</label>
                <input type="number" id="add-nota" class="form-control" v-on:keyup="updateNewBoletim">
            </div>
            <div class="form-group">
                <label for="add-faltas">Faltas</label>
                <input type="number" id="add-faltas" class="form-control" v-on:keyup="updateNewBoletim">
            </div>
            <button id="add-button" class="btn btn-default" v-on:click="createBoletim">Adicionar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['alunoid'],
        data() {
           return {
               boletins: [],
               newBoletim: {
                   materia: '',
                   nota: '',
                   faltas: '',
               },
           };
        },
        created() {
            axios.get('/boletim', {
                params: {
                     alunoid: this.alunoid,
                },
            })
                .then(response => {
                    if (0 < response.data.boletins.length) {
                        this.boletins = response.data.boletins;
                    }
                });
        },
        methods: {
            updateNewBoletim(event) {
                const fieldType = event.target.id.replace('add-', ''),
                    fieldValue = event.target.value;
                this.newBoletim[fieldType] = fieldValue;
            },
            newBoletimHasData() {
                return '' !== this.newBoletim.materia ||
                        '' !== this.newBoletim.nota ||
                        '' !== this.newBoletim.faltas;
            },
            createBoletim() {
                 if ('' !== this.newBoletim.materia &&
                        '' !== this.newBoletim.nota &&
                        '' !== this.newBoletim.faltas) {
                     axios.post('/boletim', {
                         alunoid: this.alunoid,
                         materia: this.newBoletim.materia,
                         nota: this.newBoletim.nota,
                         faltas: this.newBoletim.faltas,
                     })
                         .then(response => {
                             if ('undefined' !== typeof response.data) {
                                 this.clearNewBoletim();
                                 this.boletins.push(response.data);
                             }
                         });
                 }
            },
            clearNewBoletim() {
                this.newBoletim = {
                     materia: '',
                     nota: '',
                     faltas: '',
                }
            },
        },
    }
</script>
