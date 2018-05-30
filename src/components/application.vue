<template>

    <div id="application">
        <h1>Application</h1>
        <p>start: {{ test }}</p>
    </div>

</template>

<script>

    module.exports = {
        name: 'Application',
        data: function() {
            return {
                'test': 100
            };
        }
    };

</script>
