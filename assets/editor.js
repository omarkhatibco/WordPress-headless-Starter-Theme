console.log("editor");

// this blocks are not working in Headless Mode.
const disabledBlocks = [
  // 'core/nextpage',
  // 'core/latest-comments',
  // 'core/latest-posts',
  // 'core/archives',
  // 'core/categories',
  // 'core/search',
  // 'core/social-links',
  // 'core/social-link',
  // 'core/tag-cloud',
  // 'core/rss',
  // 'core/calendar',
  // 'core/embed',
  // 'core-embed/wordpress',
  // 'core-embed/flickr',
  // 'core-embed/animoto',
  // 'core-embed/cloudup',
  // 'core-embed/collegehumor',
  // 'core-embed/crowdsignal',
  // 'core-embed/hulu',
  // 'core-embed/imgur',
  // 'core-embed/issuu',
  // 'core-embed/kickstarter',
  // 'core-embed/meetup-com',
  // 'core-embed/mixcloud',
  // 'core-embed/polldaddy',
  // 'core-embed/reddit',
  // 'core-embed/reverbnation',
  // 'core-embed/screencast',
  // 'core-embed/scribd',
  // 'core-embed/slideshare',
  // 'core-embed/smugmug',
  // 'core-embed/speaker',
  // 'core-embed/speaker-deck',
  // 'core-embed/ted',
  // 'core-embed/tumblr',
  // 'core-embed/videopress',
  // 'core-embed/wordpress-tv',
  // 'core-embed/amazon-kindle',
  // 'core-embed/tiktok',
];

// WP Dom Ready
wp.domReady(() => {
  const { blocks } = wp;
  blocks.getBlockTypes().forEach(({ name }) => {
    if (disabledBlocks.includes(name)) {
      blocks.unregisterBlockType(name);
    }
  });

  // blocks.unregisterBlockStyle('core/button', 'default');
});
