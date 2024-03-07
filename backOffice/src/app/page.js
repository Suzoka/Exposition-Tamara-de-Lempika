import { Date } from "@/components/date/date";
import { Label } from "@/components/label/label";

export default function Home() {
  return (
    <main>
      <h1>Home</h1>
      < Label variant="adulte">Adulte</Label>
      < Label variant="jeune">Jeune</Label>
      < Label variant="handicap">Handicap</Label>
      < Date variant="day">07/03/2024</Date>
      < Date variant="hour">10:30</Date>
    </main>
  );
}
