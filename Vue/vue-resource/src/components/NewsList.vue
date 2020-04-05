<template>
	<div class="newslist">
		<div class="container">
			<ul class="media-list">
				<li class="media" v-for="article in articles">
					<div class="media-left">
						<a v-bind:href="article.url" target="_blank">
							<img class="media-object" v-bind:src="article.urlToImage">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							<a v-bind:href="article.url" target="_blank">{{ article.title }}</a>
						</h4>
						<h5><i>by {{ article.author }}</i></h5>
						<p>{{ article.description }}</p>
					</div>
				</li>
			</ul>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		name: 'newslist',
		props: ['source'],
		data() {
			return {
				articles: []
			}
		},
		methods: {
			updataSource: function (source) {
				this.$http.get('https://newsapi.org/v1/articles?source=' + source + '&apiKey=e3503747653b42f280827429414f01da')
					.then(res => {
						console.log("newslist");
						console.log(res.data.articles);
						this.articles = res.data.articles;
					})
					.catch(err => console.log("error"))
			}
		},
		created: function () {
			this.updataSource(this.source);
		},
		watch: {
			source: function (val) {
				this.updataSource(val);
			}
		}
	};
</script>

<style scoped>
	.media-object {
		width: 128px;
		padding: 10px;
	}
	.media {
		border-top: 1px solid lightgrey;
		padding-top: 20px;
	}
</style>