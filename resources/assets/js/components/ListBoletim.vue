<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Matéria</td>
                    <td>Nota</td>
                    <td>Faltas</td>
                    <td> </td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(boletim, index) in boletins">
                    <td>{{ boletim.materia }}</td>
                    <td>{{ boletim.nota }}</td>
                    <td>{{ boletim.faltas }}</td>
                    <td>
                        <button v-on:click="removeBoletim(index)">
                            Remover
                        </button>
                    </td>
                </tr>
                <tr class="success" v-show="newBoletimHasData()">
                    <td>{{ newBoletim.materia }}</td>
                    <td>{{ newBoletim.nota }}</td>
                    <td>{{ newBoletim.faltas }}</td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
        <div class="form-inline">
            <div class="form-group">
                <label for="add-materia">Matéria</label>
                <input id="add-materia" class="form-control" v-model="newBoletim.materia">
            </div>
            <div class="form-group">
                <label for="add-nota">Nota</label>
                <input type="number" id="add-nota" class="form-control" v-model="newBoletim.nota">
            </div>
            <div class="form-group">
                <label for="add-faltas">Faltas</label>
                <input type="number" id="add-faltas" class="form-control" v-model="newBoletim.faltas">
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

        /**
         * Inicializa listagem do boletim com todos
         * os registros relacionados ao aluno.
         */
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
            /**
             * Verifica se o formulário de nova linha
             * de boletim possui algum dado preenchido.
             * @returns {boolean}
             */
            newBoletimHasData() {
                return '' !== this.newBoletim.materia ||
                        '' !== this.newBoletim.nota ||
                        '' !== this.newBoletim.faltas;
            },

            /**
             * Cria nova linha do boletim via ajax. Se a requisição
             * foi um sucesso, limpa o form e adiciona a nova linha à lista.
             */
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

            /**
             * Limpa o formulário de criação do boletim
             * reiniciando o objeto newBoletim.
             */
            clearNewBoletim() {
                this.newBoletim = {
                     materia: '',
                     nota: '',
                     faltas: '',
                }
            },

            removeBoletim(boletimIndex) {
               console.log(boletimIndex, this.boletins[boletimIndex].id);
               this.boletins.splice(boletimIndex, 1);
            },
        },
    }
</script>
