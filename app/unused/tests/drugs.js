const wikiUrl = 'https://en.wikipedia.org/api/rest_v1/page/summary/Asprin';
const div =  document.querySelector('div');

fetch(wikiUrl)
.then(
    res =>{
        console.log(res);
        return res.json();
    }
)
.then(
    drug =>{
        console.log(drug);
        return drug;
    }
)
.then(generateHTML)


function generateHTML(data){
    console.log(data.originalimage.height);
    div.innerHTML += 
    `
    <img src=${data.thumbnail.source}>

    `;  
    
}