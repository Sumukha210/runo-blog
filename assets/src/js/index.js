const loadPageJsFiles = async () => {
  const pageName = document.body.dataset.pagename;

  if (pageName === "frontPage") {
    console.log("front page");
    await import(/* webpackChunkName: "frontHomePage", */ "./pages/frontPage");
  }
};

loadPageJsFiles();
