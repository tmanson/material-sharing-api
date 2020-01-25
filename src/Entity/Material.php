<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"security"="is_granted('ROLE_MATERIAL_LIST_READ')"},
 *         "post"={"security"="is_granted('ROLE_MATERIAL_LIST_WRITE')"},
 *         "put"={"controller"=NotFoundAction::class, "read"=false, "output"=false},
 *         "patch"={"controller"=NotFoundAction::class, "read"=false, "output"=false},
 *         "delete"={"controller"=NotFoundAction::class, "read"=false, "output"=false},
 *     },
 *     itemOperations={
 *         "get"={"security"="is_granted('ROLE_MATERIAL_READ')"},
 *         "post"={"security_post_denormalize"="is_granted('ROLE_MATERIAL_WRITE')"},
 *         "put"={"security_post_denormalize"="is_granted('ROLE_MATERIAL_WRITE')"},
 *         "patch"={"security_post_denormalize"="is_granted('ROLE_MATERIAL_WRITE')"},
 *         "delete"={"security_post_denormalize"="is_granted('ROLE_MATERIAL_WRITE')"},
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MaterialRepository")
 */
class Material
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32, unique=true)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 1,
     *      max = 32,
     *      minMessage = "Code must be at least {{ limit }} characters long",
     *      maxMessage = "Code cannot be longer than {{ limit }} characters"
     * )
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotBlank
     *  @Assert\Length(
     *      min = 5,
     *      max = 128,
     *      minMessage = "Short label must be at least {{ limit }} characters long",
     *      maxMessage = "Short label cannot be longer than {{ limit }} characters"
     * )
     */
    private $shortLabel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Assert\Length(
     *      min = 0,
     *      max = 255,
     *      minMessage = "Long label must be at least {{ limit }} characters long",
     *      maxMessage = "Long label cannot be longer than {{ limit }} characters"
     * )
     */
    private $longLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getShortLabel(): ?string
    {
        return $this->shortLabel;
    }

    public function setShortLabel(string $shortLabel): self
    {
        $this->shortLabel = $shortLabel;

        return $this;
    }

    public function getLongLabel(): ?string
    {
        return $this->longLabel;
    }

    public function setLongLabel(?string $longLabel): self
    {
        $this->longLabel = $longLabel;

        return $this;
    }
}
