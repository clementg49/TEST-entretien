const articleList = [];
// In a real app this list would be full of articles.
class Article {
  kudos;
  constructor(kudos) {
    this.kudos = kudos;
  }
}

const kudos = 5;

//j'ai remplacé les var(dépréciés) en let/const
// j'ai créé la classe Article
function calculateTotalKudos( articles) {
  let totalKudos = 0;

  for (let article of articles) {
    totalKudos += article.kudos;
  }

  return totalKudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);
