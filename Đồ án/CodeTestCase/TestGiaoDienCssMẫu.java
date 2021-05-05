import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import java.util.concurrent.TimeUnit;
import org.junit.Assert;
import org.openqa.selenium.Point;
import org.openqa.selenium.support.Color;
public class CssColorValue {
   public static void main(String[] args) {
      System.setProperty("webdriver.chrome.driver","C:\\JavaWeb\\JavaApplication6\\Lib\\chromedriver\\chromedriver.exe");
      WebDriver driver = new ChromeDriver();
      String url = "http://zero.webappsecurity.com/login.html";
      driver.get(url);
      driver.manage().window().maximize();
      driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
      //getting color attribute with getCssValue()
      //Xpath=//tagname[@attribute='value'] định dạng Xpath
       System.out.println("Tieu de trang" + driver.getTitle()); 
     
      String colr = driver.findElement(By.xpath("//input[@type='submit']")).getCssValue("color");
      //getting background color attribute with getCssValue()
      String bckgclr = driver.findElement(By.xpath("//input[@type='submit']")).getCssValue("background-color");
      System.out.println(colr);
      System.out.println(bckgclr);
      String hexcolor = Color.fromString(bckgclr).asHex(); //converted Into HexFormat
      System.out.println(hexcolor);
      //Assert.assertEquals("actual_hex should equal to: ", "#808080", hexcolor);
      WebElement page_header = driver.findElement(By.className("page-header"));
      
      WebElement title_header = driver.findElement(By.xpath("//div[@class='page-header']/h3"));
       //Used points class to get x and y coordinates of element.
      Point classname = page_header.getLocation();
      int xcordi = classname.getX();
      System.out.println("Element's Position from left side"+xcordi +" pixels.");
      int ycordi = classname.getY();
      System.out.println("Element's Position from top"+ycordi +" pixels.");
       System.out.println("Độ rộng page_header"+page_header.getSize().width);
       System.out.println("Độ cao page_header"+page_header.getSize().height);
       System.out.println("Độ rộng của thẻ h3 trong class page_header"+title_header.getSize().getHeight());
      driver.close();
   }
}