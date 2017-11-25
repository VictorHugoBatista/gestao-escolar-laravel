<template>
    <div>
        {{ alunoid }}
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
                    console.log(response);
                });
        },
    }
</script>
