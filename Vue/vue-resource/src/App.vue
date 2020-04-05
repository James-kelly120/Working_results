<template>
  <div class="container" id="app">
    <SourceSelection @sourceChanged="sourceChanged"></SourceSelection>
    <NewsList v-bind:source="source"></NewsList>
  </div>
</template>

<script>
import SourceSelection from './components/SourceSelection'
import NewsList from './components/NewsList'
import HelloWorld from './components/HelloWorld'
export default {
  name: 'App',
  components: {
    SourceSelection,
    NewsList,
    HelloWorld
  },
  data() {
    return {
      source: ''
    }
  },
  methods: {
    sourceChanged: function (source) {
      this.source = source;
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
