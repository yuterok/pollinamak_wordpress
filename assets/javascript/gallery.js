let imageIndex = 0;

for (let i = 1; i <= images.length; i++) {
  let item = {
    id: i,
    title: `Post ${i}`,
    image: images[imageIndex],
  };
  posts.push(item);
  imageIndex++;
  if (imageIndex > images.length - 1) imageIndex = 0;
}

const portfolioGrid = document.querySelector('.portfolio_grid');
function generateMasonryGrid(columns, posts) {
  portfolioGrid.innerHTML = '';

  //Store column arrays that contain relevant posts
  let columnWrappers = {};

  //Create column item array and  add this to column wrapper object
  for (let i = 0; i < columns; i++) {
    columnWrappers[`column${i}`] = [];
  }
  for (let i = 0; i < posts.length; i++) {
    const column = i % columns;
    columnWrappers[`column${column}`].push(posts[i]);
  }
  for (let i = 0; i < columns; i++) {
    let columnPosts = columnWrappers[`column${i}`];
    let column = document.createElement('div');
    column.classList.add('column');
    columnPosts.forEach((posts) => {
      let postA = document.createElement('a');
      postA.classList.add('wow');
      postA.classList.add('fadeInUp');
      postA.classList.add('post');
      postA.classList.add('data-fancybox');
      postA.href = posts.image;
      postA.setAttribute('data-fancybox', 'gallery');
      let image = document.createElement('img');
      image.src = posts.image;
      let overlay = document.createElement('div');
      overlay.classList.add('overlay');
    //   let title = document.createElement('h3');
    //   title.innerText = posts.title;

    //   overlay.appendChild(title);
      postA.append(image, overlay);
      column.appendChild(postA);
    });
    portfolioGrid.appendChild(column);
  }
}

let previousScreenSize = innerWidth;

window.addEventListener('resize', () => {
  imageIndex = 0;
  if (innerWidth < 600 && previousScreenSize >= 600) {
    generateMasonryGrid(2, posts);
  } else if (
    innerWidth >= 600 &&
    innerWidth < 1000 &&
    (previousScreenSize < 600 || previousScreenSize >= 1000)
  ) {
    generateMasonryGrid(2, posts);
  } else if (innerWidth >= 1000 && previousScreenSize < 1000) {
    generateMasonryGrid(3, posts);
  }
  previousScreenSize = innerWidth;
});

//Page Load
if (previousScreenSize < 600) {
  generateMasonryGrid(2, posts);
} else if (previousScreenSize >= 600 && previousScreenSize < 1000) {
  generateMasonryGrid(2, posts);
} else {
  generateMasonryGrid(3, posts);
}
