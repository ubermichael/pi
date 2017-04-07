<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nines\UtilBundle\Entity\AbstractEntity;

/**
 * Channel
 *
 * @ORM\Table(name="channel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChannelRepository")
 */
class Channel extends AbstractEntity {

    const CHANNEL_BASE = "https://www.youtube.com/channel/";
    
    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $youtubeId;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=200)
     */
    private $thumbnailUrl;
    
    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $published;

    /**
     * @var Collection|Comment[]
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="channel")
     */
    private $comments;

    /**
     * @var Collection|Comment[]
     * @ORM\OneToMany(targetEntity="Video", mappedBy="channel")
     */
    private $videos;

    /**
     * @var Collection|Playlist[]
     * @ORM\OneToMany(targetEntity="Playlist", mappedBy="channel")
     */
    private $playlists;

    public function __construct() {
        parent::__construct();
        $this->comments = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->playlists = new ArrayCollection();
    }

    public function __toString() {
        
    }

    /**
     * Add comment
     *
     * @param Comment $comment
     *
     * @return Channel
     */
    public function addComment(Comment $comment) {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param Comment $comment
     */
    public function removeComment(Comment $comment) {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return Collection
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * Add video
     *
     * @param Video $video
     *
     * @return Channel
     */
    public function addVideo(Video $video) {
        $this->videos[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param Video $video
     */
    public function removeVideo(Video $video) {
        $this->videos->removeElement($video);
    }

    /**
     * Get videos
     *
     * @return Collection
     */
    public function getVideos() {
        return $this->videos;
    }


    /**
     * Set youtubeId
     *
     * @param string $youtubeId
     *
     * @return Channel
     */
    public function setYoutubeId($youtubeId)
    {
        $this->youtubeId = $youtubeId;

        return $this;
    }

    /**
     * Get youtubeId
     *
     * @return string
     */
    public function getYoutubeId()
    {
        return $this->youtubeId;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return self::CHANNEL_BASE . $this->youtubeId;
    }

    /**
     * Set thumbnailUrl
     *
     * @param string $thumbnailUrl
     *
     * @return Channel
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    /**
     * Get thumbnailUrl
     *
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Channel
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Channel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set published
     *
     * @param DateTime $published
     *
     * @return Channel
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return DateTime
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Add playlist
     *
     * @param Playlist $playlist
     *
     * @return Channel
     */
    public function addPlaylist(Playlist $playlist)
    {
        $this->playlists[] = $playlist;

        return $this;
    }

    /**
     * Remove playlist
     *
     * @param Playlist $playlist
     */
    public function removePlaylist(Playlist $playlist)
    {
        $this->playlists->removeElement($playlist);
    }

    /**
     * Get playlists
     *
     * @return Collection
     */
    public function getPlaylists()
    {
        return $this->playlists;
    }
}
