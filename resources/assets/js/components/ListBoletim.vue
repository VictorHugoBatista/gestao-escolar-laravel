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
            console.log(this.alunoid);
        },
    }
</script>
